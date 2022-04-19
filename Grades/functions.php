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
    $sql="SELECT b.*  , Lesson.name , Lesson.description FROM (SELECT Teacher.fullname,Teacher.lvl , a.* FROM (SELECT * FROM `Teaching` WHERE 1) as a ,Teacher WHERE Teacher.id=a.tID) as b , Lesson WHERE b.lId = Lesson.id ;";
    $result= mysqli_query($con, $sql);
	return $result;
}
//UPDATE Teaching SET weightTheory=?, weightLab=?,labLimit=?,theoryLimit=? WHERE id =?
function setWeightsAndLimits($con,$id,$wt,$wl,$ll,$tl){
	$stmt=$con->prepare("UPDATE Teaching SET weightTheory=?, weightLab=?,labLimit=?,theoryLimit=? WHERE id =?");
    $stmt->bind_param("ddiii",$wt,$wl,$ll,$tl,$id);
	if($stmt == false){
		print($con->error);
	}
	$stmt->execute();
}
function resetStatement($con , $stAm){
	$stmt=$con->prepare("DELETE FROM `Statement` WHERE stAm=?");
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param( "s", $stAm);
	$stmt->execute();
}
function makeStatement($con, $stAm ,$teachingId ){
	$stmt=$con->prepare("INSERT INTO Statement(stAm, teachingId) VALUES (?,?)");
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param( "si", $stAm, $teachingId);
	$stmt->execute();
}
//DELETE FROM `Statement` WHERE stAm=?
//SELECT fullname ,c.* FROM Teacher,(SELECT Lesson.name,b.* FROM Lesson ,(SELECT tid,lId,Teaching.id as teach_id FROM Teaching ,(SELECT * FROM `Statement` WHERE stAm=?) AS a WHERE teachingId= Teaching.id ) as b WHERE id = b.lId) as c WHERE c.tid = Teacher.id
function getStatementLessons($con,$stAm){
	$sql="SELECT fullname ,c.* FROM Teacher,(SELECT Lesson.description,Lesson.name,Lesson.semester,b.* FROM Lesson ,(SELECT tid,lId,Teaching.id as teach_id FROM Teaching ,(SELECT * FROM `Statement` WHERE stAm=?) AS a WHERE teachingId= Teaching.id ) as b WHERE id = b.lId) as c WHERE c.tid = Teacher.id";
	$stmt=$con->prepare($sql);
	if($stmt == false){
		print($con->error);
	}
	$stmt->bind_param("s",$stAm);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;

}
//SELECT a.*,Lesson.name,Lesson.semster FROM Lesson,(SELECT * FROM `Teaching` WHERE tId=?) as a WHERE Lesson.id = a.lId
function getLessonsByTeacher($con,$tid){
	$sql="SELECT a.*,Lesson.name,Lesson.semester FROM Lesson,(SELECT * FROM `Teaching` WHERE tId=?) as a WHERE Lesson.id = a.lId";
	$stmt=$con->prepare($sql);
	if($stmt == false){
		print($con->error);
	}
	$stmt->bind_param("i",$tid);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;

}
function getStatementByTeaching($con,$teachingId){
	$sql="SELECT * FROM `Statement` WHERE teachingId = ?";
	$stmt=$con->prepare($sql);
	if($stmt == false){
		print($con->error);
	}
	$stmt->bind_param("i",$teachingId);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;

}
function setGrades($con,$thgrade,$lagrade,$stAm,$teachingId ){
	$stmt=$con->prepare("UPDATE `Statement` SET `theoryGrade`=?,`labGrade`=? WHERE stAm=? AND teachingId=?");
    if($stmt == false){
        print($con->error);
    }
	$stmt->bind_param( "iisi", $thgrade, $lagrade, $stAm, $teachingId);
	$stmt->execute();
}
//SELECT Lesson.name , b.* ,(b.labGrade*b.weightLab)+(b.theoryGrade*b.weightTheory) as grade FROM Lesson,(SELECT labGrade,theoryGrade,lId,weightTheory,weightLab FROM Teaching,(SELECT * FROM `Statement` WHERE stAm=?) as a where teachingId=Teaching.id) as b WHERE lId=Lesson.id
function getStudentGrades($con,$stAm){
	$sql="SELECT Lesson.name , b.* ,(b.labGrade*b.weightLab)+(b.theoryGrade*b.weightTheory) as grade FROM Lesson,(SELECT labGrade,theoryGrade,lId,weightTheory,weightLab FROM Teaching,(SELECT * FROM `Statement` WHERE stAm=?) as a where teachingId=Teaching.id) as b WHERE lId=Lesson.id";
	$stmt=$con->prepare($sql);
	if($stmt == false){
		print($con->error);
	}
	$stmt->bind_param("s",$stAm);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result;
}
?>