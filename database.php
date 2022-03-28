
<?php 
$user ="iscd16191";
$pass ="1234";
$db ="PSD";
$host ="localhost";
//$con = mysqli_connect($host,$user,$pass,$db,'3306');
$con =new mysqli($host,$user,$pass,$db);
/*if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}*/
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
ini_set('display_errors', 'On');
//testing here
 //first test prepared statement 
 // $result = getStudentFromDatabase($con,1);
 // while($row = $result->fetch_assoc()){
  //  print($row["fullname"]);
  //}
//second test
  //$result=getAllUserInfo($con);
  //while($row = $result->fetch_array()){
  //  print($row["name"]);
  //}

//get all user info function for admin
function getAllUserInfo($con){
    
    $sql = "SELECT * FROM `Usr` WHERE 1"; 
    $result = mysqli_query($con, $sql) or printf("error: %s\n", mysqli_error($con));
    return $result;                                                   
}
//teachers and students and users
include "usersM_functions.php";
//the addition of the admin user
//addUser($con,"admin","1234","admin","admin@email.com");

//mail verification function
function mailVerificationStudent($con,$name,$pass,$role,$am,$fullname,$entyear,$email){
  if(studentExists($con,$am)){
    return -1;
  }
  $subject="account verification";
  $message="http://localhost/Ergasia/verify.php?role=Φοιτητής";
  $headers="From:noreply@Panepistimio.com" ."\r\n/";
  mail($email,$subject,$message,$headers);
  return 0;
}
function mailVerificationTeacher($con,$name,$pass,$role,$level,$fullname,$email){

}



?>

