<?php

function showLessons($con){
    $sql="SELECT * FROM Lesson WHERE 1";
	$result= mysqli_query($con, $sql);
	return $result;
}
function addLesson($con,$semester,$description,$name ){
	$stmt=$con->prepare("INSERT INTO Lesson (semester,description,name) VALUES (?,?,?)");
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param( "iss", $semester, $description, $name);
	$stmt->execute();
}
function searchLesson($con,$title){
	$sql="SELECT * FROM Lesson WHERE name LIKE ?";
	$stmt=$con->prepare($sql);
    $title='%'.$title.'%';
	$stmt->bind_param("s",$title);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
  }
  function getLesson($con,$id){
	$sql="SELECT * FROM Lesson WHERE id = ?";
	$stmt=$con->prepare($sql);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
  }
   function updateLesson($con,$id,$semester,$description,$name){
	$sql="UPDATE Lesson SET semester=? , description=? , name=? WHERE id=?";
	$stmt=$con->prepare($sql);
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param("issi",$semester,$description,$name,$id);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
  }
  //UPDATE Lesson SET semester=? , description=? , name=? ,WHERE id=?
  function delLesson($con,$id ){
	$stmt=$con->prepare("DELETE FROM `Lesson` WHERE id = ?");
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param( "i", $id);
	$stmt->execute();
}
function showTeachers($con){
    $sql="SELECT * FROM `Teacher` WHERE 1";
	$result= mysqli_query($con, $sql);
	return $result;
}
//INSERT INTO Teaching( year, semester ,tId, lId) VALUES (? , ? ,? ,? )
function assignToTeacher($con ,$year , $tid,$lid){
    $lesson= getLesson($con,$lid);
    $lesson=$lesson->fetch_assoc();
    $semester = $lesson['semester'];
    $stmt=$con->prepare("INSERT INTO Teaching (year , semester , tId , lId ) VALUES (?,?,?,?)");
    $stmt->bind_param("iiii",$year,$semester,$tid,$lid);
    $stmt->execute();
}
function showTeachings($con){
    $sql="SELECT * FROM `Teaching` WHERE 1";
    $result= mysqli_query($con, $sql);
	return $result;
}
?>