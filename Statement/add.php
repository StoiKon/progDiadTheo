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
                    <a href="#">Εισαγωγή Βαθμολόγιών</a>
               </li>
               <li>
                    <a href="#">Αναζήτηση Βαθμολογιών</a>
               </li>
               <li>
                    <a href="#">Οριστικοποίηση Βαθμολογίας</a>
               </li>
               <li><a href="#">Εμφάνηση Βαθμολογίας</a></li>
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
               <li>
                    <a href="#">Οριστικοποίηση Δήλωσης</a>
               </li>
               <li><a href="#">About</a></li>
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
                    <a href="#">Επισκόπηση Προφίλ</a>
               </li>
               <li>
                    <a href="#">Τροποποίηση Προφίλ</a>
               </li>
               <li>
                    <a href="#">Διαχείρηση Χρηστών</a>
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
                    
                    <?php
                    
                    if(isset($_POST['badd'])){
                        if(isset($_POST['lessons']) ){
                            //$lessons = $_POST['lessons'];
                            resetStatement($con,$_SESSION['stAm'],$t);
                            foreach($_POST['lessons'] as $t){
                                makeStatement($con,$_SESSION['stAm'],$t);
                            }

                        }                    
                    }
                    print( "<h>χρήστης ".$_SESSION['name'] ." ρόλος ". $_SESSION['role']." AM ".$_SESSION['stAm']."</h>" );
                    ?>
                    <div id="addL" style="width:60vw;max-width:600px" class="h-25 p-3 mt-5 mx-auto px-auto">
                    <form id="addForm" method="POST">
                    <?php
                        $result=showTeachings($con);
                        ?><table class="table">
                            <thead><tr>
                                    <th scope="col">Τίτλος</th>
                                    <th scope="col">διδάσκοντας</th>
                                    <th scope="col">Περιγραφή</th>
                                    <th scope="col">εξάμηνο</th>
                                    <th scope="col">Δήλωση</th>
                            </tr></thead><tbody><?php
                            while($row= $result->fetch_assoc()){
                                ?><tr>
                                <td><?php print($row['name']); ?></td>
                                <td><?php print($row['fullname']); ?></td>
                                <td><?php print($row['description']); ?></td>
                                <td><?php print($row['semester']);?></td>
                                <td><input type="checkbox" class="form form-check-input" name="lessons[]" value="<?php echo($row['id']); ?>" ></td>
                                
                            </tr><?php
                            }
                        
                        ?></tbody></table><?php
                    
                    ?>
                    <button type="submit" name="badd" id="addLessonsForm" class="btn btn-info mt-2 mx-3" >Υποβολή</button>
                </form>
                    </div>
                    </div>


                </div>
                
            </nav>
        </div>
    </div>
</body>
</html>