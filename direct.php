<?
/*


    example :

    <img src="/qrcode/direct.php?data=http://bojagicard.com/<?=$ecard?>&ecc=L&pixel=4.5&border=0&type=qrcode.png&hash=<?=$hash?>" />


*/

$data = $_GET["data"];
$ecc = $_GET["ecc"];
$pixel = $_GET["pixel"];
$border = $_GET["border"];
$format = $_GET["format"];
$filename = $_GET["filename"];

//if ($filename) header("Content-Disposition: attachment; filename=".$filename);
if ($filename) header("Content-Disposition: inline; filename=\"".$filename."\"");

if (!isset($data)) $data = "http://bojagicard.com";
if (!isset($ecc)) $ecc = "Q";
if (!isset($pixel)) $pixel = "7";
if (!isset($border)) $border = "2";


include "qrlib.php";
ob_start("callback"); 
$debugLog = ob_get_contents(); 
ob_end_clean(); 


if ($format == "gif") {
    
    $tmpfile = "./temp/".md5("qr".time()).".png";
    QRcode::png($data, $tmpfile, $ecc, $pixel, $border);  //qrimage.php 에 정의되있음

    header("Content-type: image/gif");
    $im = imagecreatefrompng($tmpfile);


//1.백그라운드 이미지 불러오기
//2. QR코드와 백그라운드 합치기


    imagegif($im);  //출력
    unlink($tmpfile);

} else if ($format == "jpg") {

    $tmpfile = "./temp/".md5("qr".time()).".png";
    QRcode::png($data, $tmpfile, $ecc, $pixel, $border);  //qrimage.php 에 정의되있음

    header("Content-type: image/jpg");
    $im = imagecreatefrompng($tmpfile);
    imagejpeg($im, 90);
    unlink($tmpfile);

} else {

    QRcode::png($data, false, $ecc, $pixel, $border);  //qrimage.php 에 정의되있음

}



?>
