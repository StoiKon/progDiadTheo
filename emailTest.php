<?php
error_reporting(-1);
ini_set('display_errors', 'On');
print("sending email<br>");
$email="icsd16191@aegean.gr";
$subject="Verification email";
$message="http://localhost/Ergasia/verify.php?role=Φοιτητής";
$headers="From:icsd16191@aegean.gr" ."\r\n/";
$result=mail($email,$subject,$message,$headers);
if($result == true){
   print("email sent");
}else{
   print("email failed");
 }
?>