<?php
require('fpdf.php');
header('content-type:image/jpeg');

$image=imagecreatefromjpeg("final.jpg");//Image Pointer  
$color=imagecolorallocate($image,19,21,22);

$subject="For a php Quiz Test";

$sign="Arin";

$marks="Has scored 1/10 in 1 attempts";
$tdate=date('d-m-Y');

imagettftext($image,23,0,390,320,$color,"def.ttf",$subject);
imagettftext($image,40,0,460,500,$color,"namefont.ttf",$sign);
imagettftext($image,23,0,325,537,$color,"def.ttf",$marks);
imagettftext($image,23,0,680,680,$color,"def.ttf",$tdate);
imagettftext($image,23,13,200,693,$color,"namefont.ttf",$sign);//used to give text in image para(imagepomter , font size , font angle,x axis , y axis,colr,font,text)
imagejpeg($image,"temp.jpg");//show directly or save




$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("temp.jpg",0,25,210,150);
$pdf->Output("test.pdf","F");//F- Force Save.




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$email = new PHPMailer();
$email->SetFrom('alvfcoc#gmail.com', 'Your Name'); //Name is optional
$email->Subject   = 'Certificate!!';
$email->Body      = 'Here is the certificate for the recent exam given : ';
$email->AddAddress( 'arindhimar116@gmail.com' );

$file_to_attach = 'test.pdf';

$email->AddAttachment( $file_to_attach , "".random_int(1111111, 9999999).".pdf" );
$email->Send();
$mail->send();

?>
