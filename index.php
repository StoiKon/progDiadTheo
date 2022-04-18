<!DOCTYPE html>
<?php 
session_start();
?>
<html>
<head>
  <?php include 'database.php';?>
  <meta charset="utf-8">
  <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Javascript dependency for bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Πανεπιστήμιο</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
  @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 400;
    line-height: 2em;
    color: #999;
}</style>
</head>
<body>
<div>
    <nav style="background: #010518;" class="navbar navbar-dark">
      <a class="navbar-brand textLogo px-5" href="#">Πανεπιστήμιο</a>
    </nav>
</div>
  <?php
  //login 
  
  if(isset($_POST['lb'])){
    if(isset($_POST['lname']) && !empty($_POST['lname'])){
      if(isset($_POST['lpassword']) && !empty($_POST['lpassword'])){
        $result=getUser($con,$_POST['lname']);
        while($row = $result->fetch_assoc()){
          if(!password_verify($_POST['lpassword'],$row["psw"])){
          ?><p style="color:red;"><?php print("Έχετε υποβάλει λάθος στοιχεία"); ?></p><?php
        }else{
          //successfull login here
          $row= $result->fetch_assoc();
          $_SESSION["name"]=$_POST["lname"];
          $_SESSION["role"]=$row["role"];
          $_SESSION["stAm"]=$row["stAm"];
          $_SESSION["tId"]=$row["tId"];
          $_SESSION["email"]=$row["email"];
          header("Location:home.php");          
        }
       }
        
      }
    }
  }
  
  //sign up form
  if(isset($_POST['sb'])){
    if(isset($_POST["lusername"]) && !empty($_POST["lusername"])){
      if(isset($_POST['passw']) && !empty($_POST["passw"])){
        if(isset($_POST["mail"]) && !empty($_POST["mail"])){
          if(isset($_POST["fullname"]) && !empty($_POST["fullname"])){
            if(isset($_POST["role"]) && !empty($_POST["role"])){
              if(strcmp($_POST["role"] ,"Διδάσκων" )==0){
                $name=$_POST["lusername"];
                $role=$_POST["role"];
                $fullname=$_POST["fullname"];
                $email=$_POST['mail'];
                $psw=$_POST['passw'];
                if(isset($_POST['level']) && !empty($_POST['level'])){
                  $level=$_POST['level'];
                  addTeacher($con,$fullname,$level);
                  // gia na parw to id
                  $result=getTeacherByName($con,$fullname);
                  $row= $result->fetch_assoc();
                  $tId = $row['id'];
                  addTeUser($con,$name,$psw,$role,$tId,$email);
                   ?><p class="alert alert-primary"><?php print("εγγραφή διδάσκοντα");?></p> <?php    
                  
                } 
              }
                
              
              if(strcmp($_POST["role"] ,"Φοιτητής" )==0){
                $name=$_POST["lusername"];
                $role=$_POST["role"];
                $fullname=$_POST["fullname"];
                $email=$_POST['mail'];
                $psw=$_POST['passw'];
                if(isset($_POST['am']) && !empty($_POST['am'])){
                  if(isset($_POST['entYear']) && !empty($_POST['entYear'])){
                    $am=$_POST['am'];
                    $entyear=$_POST['entYear'];
                    addStudent($con,$am,$fullname,$entyear);
                    addStUser($con,$name,$psw,$role,$am,$email);
                   ?><p class="alert alert-primary"><?php print("εγγραφή φοιτητή");?></p> <?php    
                  }
                } 
              }
            }
          }
        }
      }
    }
  }
  if(isset($_POST['v'])){
    header("Location:home.php");
  } 
  ?>
  <style>
    .hide{
      display: none;
    }

  </style>
 
  <div class="mt-1 ml-3 px-5">
    <p>Καλώς ήρθατε στο Πανεπιστήμιο<p>
  </div>
<br>
<br>
  <div style="margin-inline: 20vw diplay:flex" class="mx-4">
  <button style="max-width:100px;width:30vw;height:10vh" id="showbtn" class="btn btn-secondary mx-2 px-1 mt-1">εμφάνηση login</button>
  <button style="max-width:100px;width:30vw;height:10vh" id="showbtn0" class="btn btn-secondary mx-2 px-1 mt-1">εμφάνηση εγγραφής</button>
  <button style="max-width:100px;width:30vw;height: 10vh" id="showbtn1" name="v" value="v" class="btn btn-secondary mx-2 px-1 mt-1">επισκέπτης</button>
</div>
  <script src="index.js"></script>

  <div id ="loginForm" style="width:60vw;max-width:600px" class="hide loginform h-25 p-3 mt-5 mx-auto px-auto">
    <form id=lForm method="POST">
      <div class="mb-1 mt-2">
        <label for="inputUsername" class="form-label w-auto">Όνομα Χρήστη</label>
        <input name="lname" type="text" class="form-control" id="lname" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-1 mt-2">
        <label for="inputPassword" class="form-label w-auto">κωδικός</label>
        <input name="lpassword" type="password" class="form-control " id="lpassword" required>
      </div>
      <div class="mb-1 form-check mt-2">
      <button name="lb" value="lb" type="submit" class="btn btn-primary">Σύνδεση</button>  
      </div>
      
    </form>
  </div>
      <div id="sign" style="width:60vw;max-width:600px;" class="hide mt-5 mx-auto">
      <!-- Sign up form -->  
      <form method="POST">
        <div class="form-group">
        <label for="sign">Email</label>
        <input name="mail" type="email" class="form-control" id="semail" aria-describedby="emailHelp" required>
     
      </div>
        <div class="form-group">
          <label for="sign">'Ονομα Χρήστη</label>
          <input name="lusername" type="text" class="form-control" id="susername" aria-describedby="emailHelp" required>

     
        </div>
      <div class="form-group mt-2">
        <label for="sign">Κωδικός</label>
        <input name="passw" type="password" class="form-control" id="spassword" required>
      </div>
      <div class="form-group mt-2">
        <label>Ρόλος</label>  
      <select  id="role" name="role" class="form-control form-control-md">
        <option value="Διδάσκων">Διδάσκων</option>
        <option value="Φοιτητής">Φοιτητής</option>
      </select>
      </div>
      <div class="form-group mt-2">
        <label for="sign">'Ονοματεπώνυμο</label>
        <input name="fullname" type="text" class="form-control" id="sfullname" >
      </div>
      <div id="amd" class="form-groupi mt-2">
        <label for="sign">Αριθμός μητρώου</label>
        <input name="am" type="text" class="form-control" id="sam">
        <label for="sign">Έτος εγγραφής</label>
        <input name="entYear" type="text" class="form-control" id="sam">
      </div>
      <div id="bathmd" class="form-group mt-2">
        <label for="sign">Βαθμίδα</label>
       
      <select name="level" id="bathm" class="form-control form-control-md mt-2">
        <option value="Επίκουορς">Επίκουρος</option>
        <option value="Αναπληρωτής">Αναπληρωτής</option>
        <option value="Καθηγητής">Καθηγητής</option>
      </select>

      </div>
      
      <button type="submit" value="sb" name="sb" class="mt-2 btn btn-primary">εγγραφή</button>
      </div>
  </form>
  </div>

</body>
</html>

