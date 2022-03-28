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
	$con->prepare($sql);
	$stmt->bintParam("ssi",$am,$fullname,$entyear);
	$stmt->execute();
	return 1;

  }


function addStUser ( $con, $name, $psw, $role, $stAm, $email  ){
	$con->prepare("INSERT INTO Usr ( name ,  psw ,  role ,  stAm,  email) VALUES (?,?,?,?,?)");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	$stmt->bindParam( "sssss", $name, $hash, $role, $stAm, $email );
	$stmt->execute();
}

function addTeUser ( $con, $name, $psw, $role, $tId, $email  ){
	$con->prepare("INSERT INTO Usr ( name ,  psw ,  role , tId, email) VALUES (?,?,?,?,?)");
	$hash = password_hash($psw, PASSWORD_DEFAULT);
	bindParam( "sssis", $name, $hash, $role, $tId, $email );
	$stmt->execute();
}

function delUserByName ( $con, $name ){
	$con->prepare("DELETE FROM  rsr  WHERE name = ?");
	$stmt->bindParam( "s", $name);
	$stmt->execute();
}

function delUserById ( $con, $id ){
	$con->prepare("DELETE FROM  Usr  WHERE id = ?");
	$stmt->bindParam( "i", $id);
	$stmt->execute();
}

function editUser ( $con, $name, $email, $id  ){
	$con->prepare("UPDATE Usr SET name=?,email=? WHERE id = ?");
	$stmt->bindParam( "ssi", $name, $email, $id );
	$stmt->execute();
}

function editStudent ( $con, $am, $fullname, $EntYear  ){
	$con->prepare("UPDATE Student SET am=?,fullname=?,EntYear=? WHERE am =?");
	$stmt->bindParam( "ssis", $am, $fullname, $EntYear, $am );
	$stmt->execute();
}

function delStudentByAm ( $con, $am ){
	$con->prepare("DELETE FROM Student WHERE am =?");
	$stmt->bindParam( "s", $am);
	$stmt->execute();
}

function getTeacherByName ( $con, $fullname  ){
	$con->prepare("SELECT * FROM Teacher WHERE fullname =?");
	$stmt->bindParam( "s", $fullname );
	$stmt->execute();
	$result=$stmt->get_result();
	return $result;
}
function getStudentByName ( $con, $fullname  ){
	$con->prepare("SELECT * FROM Student WHERE fullname =?");
	$stmt->bindParam( "s", $fullname );
	$stmt->execute();
	$result=$stmt->get_result();
	return $result;
}
function addTeacher ( $con, $fullname, $lvl  ){
	$con->prepare("INSERT INTO Teacher( fullname, lvl) VALUES (?,?)");
	$stmt->bindParam( "ss", $fullname, $lvl );
	$stmt->execute();
}

function editTeacher ( $con, $fullname, $lvl  ){
	$con->prepare("UPDATE Teacher SET fullname=?,lvl=? WHERE 1");
	$stmt->bindParam( "ss", $fullname, $lvl );
	$stmt->execute();
}

function delTeacherById ( $con, $id ){
	$con->prepare("SELECT id, fullname, lvl FROM Teacher WHERE id =?");
	$stmt->bindParam( "i", $id);
	$stmt->execute();
}

function getAllTeachers ( $con  ){
	$sql="SELECT id, fullname, lvl FROM Teacher WHERE 1";
	$result= mysqli_query($con, $sql);
	return $result;
}?>
