<DOCTYPE html>
<html>
<head>
<?php include '../database.php';
    include 'functions.php';
    session_start();?>
  <meta charset="utf-8">
  <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Javascript dependency for bootstrap-->
  <link rel="stylesheet" href="../home.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Πανεπιστήμιο</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .wrapper{
            display: flex;
            flex:wrap;
            width: 100%;

        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
        }

        #sidebar.active {
            margin-left: -250px;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
        }
        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        .no-bullets{
            list-style-type:none;
            padding: 0;
            margin: 0;
        }
        .hidden{
            display: none;
        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
        }
    </style>

</head>
<body>
    <script src="../home.js"></script>
    <script src="lessons.js"></script>
    <div class="wrapper">
        <!--  Side bar -->
        <nav id="sidebar">
       <div class="sidebar-header">
           <h3>Πανεπιστήμιο</h3>
       </div>     
       <ul class="list-unstyled components">
           <li >
               <a href="../home.php">Home</a>
           </li>
           <li>
           <a href="#lessons" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Μαθήματα</a>
           <ul class="collapse no-bullets" id="lessons">
               <li>
                    <a href="../Lessons/add.php">Εισαγωγή μαθήματος</a>
               </li>
               <li>
                    <a href="../Lessons/searchLesson.php">Αναζήτηση μαθήματος</a>
               </li>
               <li>
                    <a href="../Lessons/assignTeacher.php">Ανάθεση Διδασκαλίας</a>
               </li>
               <li><a href="../Lessons/manageTeaching.php">Διαχείρηση Διδασκαλίας</a></li>
            </ul>
            </li>
            <li >
           <a href="#grading" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Βαθμολόγηση</a>
           <ul class="collapse no-bullets" id="grading">
               <li>
                    <a href="add.php">Εισαγωγή Βαθμολόγιών</a>
               </li>
               <li>
                    <a href="search.php">Αναζήτηση Βαθμολογιών</a>
               </li>
               <li><a href="show.php">Εμφάνηση Βαθμολογίας</a></li>
               <!-- gia foithtes to teleutaio -->
            </ul>
            </li>
            <li class="">
           <a href="#statement" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Δήλωση Μαθημάτων</a>
           <ul class="collapse no-bullets" id="statement">
               <li>
                    <a href="add.php">Εισαγωγή Δήλωσης</a>
               </li>
               <li>
                    <a href="modify.php">Τροποποίηση Δήλωσης</a>
               </li>
            </ul>
            </li>
            <li class="">
           <a href="#statistics" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Στατιστικά</a>
           <ul class="collapse no-bullets" id="statistics">
               <li>
                    <a href="#">Παραγωγή και εμφάνηση Στατιστικών</a>
               </li>
               <li>
                    <a href="#">λίστα φοιτητών</a>
               </li>
               
            </ul>
            </li>
            <li class="">
           <a href="#profil" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Προφίλ</a>
           <ul class="collapse no-bullets" id="profil">
               <li>
                    <a href="vew.php">Επισκόπηση Προφίλ</a>
               </li>
               <li>
                    <a href="modifyProfile.php">Τροποποίηση Προφίλ</a>
               </li>
               <li>
                    <a href="ManageUser.php">Διαχείρηση Χρηστών</a>
                </li>
            </li>
       </ul>
        </nav>
        <!-- Page Content -->
      
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                <div class="container-fluid">
                    
                    <div class="row">
                    <div class="row">    
                <div class="col-sm">
                <button type="button" id="sidebarCollapse" class="row btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>+</span>
                </button>
                </div>
                </div>
                    
                    
                            <div class="px-auto">
                        </div>
                        <?php
                        
                    
                    $case = 0;
                    if(strcmp($_SESSION['role'],"Φοιτητής") == 0){
                        $case =1;
                        print( "<h>χρήστης ".$_SESSION['name'] ." ρόλος ". $_SESSION['role']." AM ".$_SESSION['stAm']."</h>" );}
                    if(strcmp($_SESSION['role'],"Διδάσκων") == 0){
                        $case = 2;
                        print( "<h>χρήστης ".$_SESSION['name'] ." ρόλος ". $_SESSION['role']." AM ".$_SESSION['tId']."</h>" );}
                    ?>
                    <div class="row">
                    <div id="addL" style="width:60vw;max-width:600px" class="h-50 p-3 mt-3">
                    <form id="searchForm" method="POST">
                        <button type="submit" name="show" class="btn btn-primary mt-3">εμφάνηση όλων</button>
                    </form>
                    </div>
                    <div id="addL" style="width:60vw;max-width:600px" class="h-50 p-3 mt-1">
                    <?php 
                //name
                    if(isset($_POST['tnb']) && !empty($_POST['tnb'])){
                    if(isset($_POST['tn'.$_POST['tnb']])){
                        setUsername($con , $_POST['tnb'],$_POST['tn'.$_POST['tnb']]);
                    }
                }//email
                    if(isset($_POST['teb']) && !empty($_POST['teb'])){
                    if(isset($_POST['te'.$_POST['teb']])){
                        setEmail($con , $_POST['teb'],$_POST['te'.$_POST['teb']]);
                    }
                }//fullname
                    if(isset($_POST['tfnb']) && !empty($_POST['tfnb'])){
                    if(isset($_POST['tfn'.$_POST['tfnb']])){
                        setTFullname($con ,$_POST['tfnb'], $_POST['tfn'.$_POST['tfnb']] );
                    }
                }
                 if(isset($_POST['sfnb']) && !empty($_POST['sfnb'])){
                    if(isset($_POST['sfn'.$_POST['sfnb']])){
                        setStFullname($con , $_POST['sfn'.$_POST['sfnb']] ,$_POST['sfnb'] );
                    }
                }
                if(isset($_POST['seyb']) && !empty($_POST['seyb'])){
                    if(isset($_POST['sey'.$_POST['seyb']])){
                       setStEntYear($con,$_POST['sey'.$_POST['seyb']],$_POST['seyb']);
                    }
                }
                    if(isset($_POST["show"]) || isset($_POST["search"])){
                    ?>
                    <form id="addForm" method="POST">
                    <label>Προφίλ</label>
                        <?php
                         
                        $result=getTeachers($con);
                        
                            ?><table class = "table">
                                <thead><tr>
                                    <th>όνομα χρήστη</th>
                                    <th>ρόλος</th>
                                    <th>email</th>
                                    <th>Ονοματεπώνυμο</th>
                                    <th>βαθμίδα</th>
                                
                                   
                                </tr></thead><tbody>
                        <?php 
                        while($row = $result->fetch_assoc()){
                            ?><tr><?php
                            ?><td><?php echo($row['name']); ?><input class="form form-control" name="<?php echo("tn".$row['id']);?>"><button name="tnb" class = "btn btn-primary" value="<?php echo($row['id'])?>" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['role']); ?></td><?php
                            ?><td><?php echo($row['email']); ?><input class="form form-control" name="<?php echo("te".$row['id']);?>"><button name="teb"value="<?php echo($row['id'])?>"  class = "btn btn-primary" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['fullname']); ?><input class="form form-control" name="<?php echo("tfn".$row['tId']);?>"><button name="tfnb" value="<?php echo($row['tId'])?>" class = "btn btn-primary" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['lvl']); ?></td><?php
                            ?></tr><?php
                        }
                        ?>
                            </tbody></table><?php
                        
                        $result=getStudents($con);
                        
                            ?><table class = "table">
                                <thead><tr>
                                    <th>όνομα χρήστη</th>
                                    <th>ρόλος</th>
                                    <th>email</th>
                                    <th>Ονοματεπώνυμο</th>
                                    <th>Έτος Εισαγωγής</th>
                                
                                   
                                </tr></thead><tbody>
                        <?php 
                        while($row = $result->fetch_assoc()){
                            ?><tr><?php
                            ?><td><?php echo($row['name']); ?><input class="form form-control" name="<?php echo("tn".$row['id']);?>" ><button name="tnb" class = "btn btn-primary" value="<?php echo($row['id'])?>" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['role']); ?></td><?php
                            ?><td><?php echo($row['email']); ?><input class="form form-control" name="<?php echo("te".$row['id']);?>" ><button name="teb" class = "btn btn-primary" value="<?php echo($row['id'])?>" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['fullname']); ?><input class="form form-control" name="<?php echo("sfn".$row['am']);?>" ><button name="sfnb" class = "btn btn-primary" value="<?php echo($row['am'])?>" type="submit">αλλαγή</button></td><?php
                            ?><td><?php echo($row['EntYear']); ?><input class="form form-control" name="<?php echo("sey".$row['am']);?>" ><button name="seyb" class = "btn btn-primary" value="<?php echo($row['am'])?>" type="submit">αλλαγή</button></td><?php
                            ?></tr><?php
                        }
                        ?>
                            </tbody></table><?php
                        }
                    ?>

                            
                </form>
                        </div>
                    </div>
                    </div>


                </div>
                
            </nav>
        </div>
    </div>
</body>
</html>