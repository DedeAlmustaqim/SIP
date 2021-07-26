<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./application/third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = "legal", $orientation = "landscape")
  {
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
	
	/*
	$canvas = $dompdf->getCanvas();
	
	$w = $canvas->get_width();
	$h = $canvas->get_height();
	
	$imageURL = 'http://sip.baritotimurkab.go.id/assets/images/logo.png';
	$imgWidth = 100;
	$imgHeight = 50;
	
	$canvas->set_opacity(.5);
	
	$x = ($w-1000);
	$y = ($h-600);
	
	$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight, $resolution = "normal");
	*/
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}