<?php
function getUser($con,$name){
	$stmt=$con->prepare("SELECT * FROM Usr WHERE name = ?");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	$stmt->bind_param( "s", $name );
	$stmt->execute();
	$result = $stmt->get_result();
	if(mysqli_num_rows($result) ==0 ){
		?><p style="color:red;"><?php print("Ο λογαριασμός δεν υπάρχει"); ?></p><?php
		return $result;
	}
	
	return $result;
}
function addUser($con,$name,$psw,$role,$email){
	$stmt=$con->prepare("INSERT INTO Usr ( name ,  psw ,  role ,   email) VALUES (?,?,?,?)");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	$stmt->bind_param( "ssss", $name, $hash, $role, $email );
	$stmt->execute();
}
function getStudentFromDatabase($con,$am){
	$sql="SELECT am, fullname, EntYear FROM Student WHERE am = ?";
	$stmt=$con->prepare($sql);
	$stmt->bind_param("s",$am);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
  }
function studentExists($con,$am){
	$result = getStudentFromDatabase($con,$am);
	// print(mysqli_num_rows($result));
	if(mysqli_num_rows($result) != 0){
	  return true;
	}else{
	  return false;
	}
  }
function addStudent($con,$am,$fullname,$entyear){
	if(studentExists($con,$am)){
		return -1;
	}
	$sql="INSERT INTO `Student`(`am`, `fullname`, `EntYear`) VALUES (?,?,?)";
	$stmt=$con->prepare($sql);
	$stmt->bind_param("ssi",$am,$fullname,$entyear);
	$stmt->execute();
	return 1;

  }


function addStUser ( $con, $name, $psw, $role, $stAm, $email  ){
	$stmt=$con->prepare("INSERT INTO Usr ( name ,  psw ,  role ,  stAm,  email) VALUES (?,?,?,?,?)");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	$stmt->bind_param( "sssss", $name, $hash, $role, $stAm, $email );
	$stmt->execute();
}

function addTeUser ( $con, $name, $psw, $role, $tId, $email  ){
	$stmt=$con->prepare("INSERT INTO Usr ( name ,  psw ,  role , tId, email) VALUES (?,?,?,?,?)");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	$stmt->bind_param( "sssis", $name, $hash, $role, $tId, $email );
	$stmt->execute();
}

function delUserByName ( $con, $name ){
	$stmt=$con->prepare("DELETE FROM  rsr  WHERE name = ?");
	$stmt->bind_param( "s", $name);
	$stmt->execute();
}

function delUserById ( $con, $id ){
	$stmt=$con->prepare("DELETE FROM  Usr  WHERE id = ?");
	$stmt->bind_param( "i", $id);
	$stmt->execute();
}

function editUser ( $con, $name, $email, $id  ){
	$stmt=$con->prepare("UPDATE Usr SET name=?,email=? WHERE id = ?");
	$stmt->bind_param( "ssi", $name, $email, $id );
	$stmt->execute();
}

function editStudent ( $con, $am, $fullname, $EntYear  ){
	$stmt=$con->prepare("UPDATE Student SET am=?,fullname=?,EntYear=? WHERE am =?");
	$stmt->bind_param( "ssis", $am, $fullname, $EntYear, $am );
	$stmt->execute();
}

function delStudentByAm ( $con, $am ){
	$stmt=$con->prepare("DELETE FROM Student WHERE am =?");
	$stmt->bind_param( "s", $am);
	$stmt->execute();
}

function getTeacherByName ( $con, $fullname  ){
	$stmt=$con->prepare("SELECT * FROM Teacher WHERE fullname =?");
	$stmt->bind_param( "s", $fullname );
	$stmt->execute();
	$result=$stmt->get_result();
	return $result;
}
function getStudentByName ( $con, $fullname  ){
	$stmt=$con->prepare("SELECT * FROM Student WHERE fullname =?");
	$stmt->bind_param( "s", $fullname );
	$stmt->execute();
	$result=$stmt->get_result();
	return $result;
}
function addTeacher ( $con, $fullname, $lvl  ){
	$stmt=$con->prepare("INSERT INTO Teacher( fullname, lvl) VALUES (?,?)");
	$stmt->bind_param( "ss", $fullname, $lvl );
	$stmt->execute();
}

function editTeacher ( $con, $fullname, $lvl  ){
	$stmt=$con->prepare("UPDATE Teacher SET fullname=?,lvl=? WHERE 1");
	$stmt->bind_param( "ss", $fullname, $lvl );
	$stmt->execute();
}

function delTeacherById ( $con, $id ){
	$stmt=$con->prepare("SELECT id, fullname, lvl FROM Teacher WHERE id =?");
	$stmt->bind_param( "i", $id);
	$stmt->execute();
}

function getAllTeachers ( $con  ){
	$sql="SELECT id, fullname, lvl FROM Teacher WHERE 1";
	$result= mysqli_query($con, $sql);
	return $result;
}?>
