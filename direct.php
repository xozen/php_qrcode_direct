<?

/*

    example :

    <img src="/qrcode/direct.php?data=http://domain.com&ecc=L&pixel=3&border=0&type=qrcode.png&hash=<?=$hash?>" />


*/


$data = $_GET["data"];
$ecc = $_GET["ecc"];
$pixel = $_GET["pixel"];
$border = $_GET["border"];
$format = $_GET["format"];
$filename = $_GET["filename"];


if ($filename) header("Content-Disposition: inline; filename=\"".$filename."\"");
if (!isset($data)) $data = "http://domain.com";
if (!isset($ecc)) $ecc = "Q";  // L, M, Q, H(best)
if (!isset($pixel)) $pixel = "7";
if (!isset($border)) $border = "2";


include "qrlib.php";
ob_start("callback"); 
ob_end_clean(); 


if ($format == "gif") {
    
    $tmpfile = "./temp/".md5("qr".time()).".png";
    QRcode::png($data, $tmpfile, $ecc, $pixel, $border);  //Defined in qrimage.php 

    header("Content-type: image/gif");
    $im = imagecreatefrompng($tmpfile);
    imagegif($im);
    unlink($tmpfile);

} else if ($format == "jpg") {

    $tmpfile = "./temp/".md5("qr".time()).".png";
    QRcode::png($data, $tmpfile, $ecc, $pixel, $border);

    header("Content-type: image/jpg");
    $im = imagecreatefrompng($tmpfile);
    imagejpeg($im, 90);
    unlink($tmpfile);

} else {

    QRcode::png($data, false, $ecc, $pixel, $border);

}


?>
