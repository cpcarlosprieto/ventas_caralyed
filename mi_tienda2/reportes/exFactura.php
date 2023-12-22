<?php
// Activamos el almacenamiento en el búfer
ob_start();

if (strlen(session_id()) < 1) {
    session_start();
}

if (!isset($_SESSION['nombre'])) {
    echo "Debe ingresar al sistema correctamente para visualizar el reporte";
} else {
    if ($_SESSION['ventas'] == 1) {
        // Incluimos el archivo Factura.php
        require('Factura.php');

        // Establecemos los datos de la empresa
        $logo = "logo.png";
        $ext_logo = "png";
        $empresa = "SISVentas | CARALYED";
        $documento = "1062319904";
        $direccion = "carrera 6 a bis # 8-08";
        $telefono = "3126939064";
        $email = "prieto.carlos@correounivalle.edu.co";

        // Obtenemos los datos de la cabecera de la venta actual
        require_once "../modelos/Venta.php";
        $venta = new Venta();
        $rsptav = $venta->ventacabecera($_GET["id"]);

        // Recorremos todos los valores obtenidos
        $regv = $rsptav->fetch_object();

        // Configuración de la factura
        $pdf = new PDF_Invoice('p', 'mm', 'A4');
        $pdf->AddPage();

        // Enviamos los datos de la empresa al método addSociete de la clase factura
        $pdf->addSociete(utf8_decode($empresa),
            $documento . "\n" .
            utf8_decode("Dirección: ") . utf8_decode($direccion) . "\n" .
            utf8_decode("Teléfono: ") . $telefono . "\n" .
            "Email: " . $email, $logo, $ext_logo);

        $pdf->fact_dev("$regv->tipo_comprobante ", "$regv->serie_comprobante- $regv->num_comprobante");
        

        // Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
        $cols = array("CODIGO" => 23,
            "DESCRIPCION" => 78,
            "CANTIDAD" => 22,
            "P.U." => 25,
            "DSCTO" => 20,
            "SUBTOTAL" => 22);
        
        $cols = array("CODIGO" => "L",
            "DESCRIPCION" => "L",
            "CANTIDAD" => "C",
            "P.U." => "R",
            "DSCTO" => "R",
            "SUBTOTAL" => "C");
        
        

        // Actualizamos el valor de la coordenada "y" que será la ubicación desde donde empezaremos a mostrar los datos
        $y = 85;

        // Obtenemos todos los detalles de la venta actual
        $rsptad = $venta->ventadetalles($_GET["id"]);

        while ($regd = $rsptad->fetch_object()) {
            $line = array("CODIGO" => "$regd->codigo",
                "DESCRIPCION" => utf8_decode("$regd->articulo"),
                "CANTIDAD" => "$regd->cantidad",
                "P.U." => "$regd->precio_venta",
                "DSCTO" => "$regd->descuento",
                "SUBTOTAL" => "$regd->subtotal");
            
        }

        // Letras
        require_once "Letras.php";
        $V = new EnLetras();

        $total = $regv->total_venta;
        $V = new EnLetras();
        $V->substituir_un_mil_por_mil = true;

        $con_letra = strtoupper($V->ValorEnLetras($total, " PESOS "));
        $pdf->addCadreTVAs("---" . $con_letra);

        // Mostramos el impuesto
        $pdf->addTVAs($regv->impuesto, $regv->total_venta, "$ ");
        $pdf->addCadreEurosFrancs("IVA" . " $regv->impuesto %");
        $pdf->Output('Reporte de Venta', 'I');
    } else {
        echo "No tiene permiso para visualizar el reporte";
    }
}

ob_end_flush();
?>
