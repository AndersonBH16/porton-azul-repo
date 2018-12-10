<?php
/**
 * Created by PhpStorm.
 * User: manuperez
 * Date: 12/9/18
 * Time: 1:47 AM
 */
    require_once('../../../Config/dompdf/autoload.inc.php');

    use Dompdf\Dompdf;

    $pdf = new Dompdf();
    $html = $_GET["boleta"];
    $pdf->loadHtml($html);
    $pdf->setPaper("A4");
    $pdf->render();
    return $pdf->stream("something", array("Attachment" => 0));
?>