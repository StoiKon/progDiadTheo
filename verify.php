<?php
include "database.php";
if(isset($_GET['role']) && !empty($_GET['role'])){
    if(strcmp($_GET['role'],"Διδάσκων")==0){
        print("teacher");
    }
    if(strcmp($_GET['role'],"Φοιτητής")==0){

    }
}
// http://localhost/Ergasia/verify.php?role=Διδάσκων
?>