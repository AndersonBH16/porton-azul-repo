<?php
/**
 * Created by PhpStorm.
 * User: manuperez
 * Date: 12/11/18
 * Time: 11:24 PM
 */

    require_once('../../../Config/dompdf/autoload.inc.php');

    use Dompdf\Dompdf;

    $pdf = new Dompdf();
    $html = $_GET["comprobante"];
    $pdf->loadHtml($html);
    $pdf->setPaper("A4", "landscape");
    $pdf->render();
    return $pdf->stream("something", array("Attachment" => 0));
?>