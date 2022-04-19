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
           <li class="active">
           <a href="#lessons" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-togle">Μαθήματα</a>
           <ul class="collapse no-bullets" id="lessons">
               <li >
                    <a href="add.php">Εισαγωγή μαθήματος</a>
               </li>
               <li >
                    <a href="searchLesson.php">Αναζήτηση μαθήματος</a>
               </li>
               <li >
                    <a href="assignTeacher.php">Ανάθεση Διδασκαλίας</a>
               </li>
               <li class="active"><a href="manageTeaching.php">Διαχείρηση Διδασκαλίας</a></li>
            </ul>
            </li>
            <li class="">
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
                    <a href="../Statement/add.php">Εισαγωγή Δήλωσης</a>
               </li>
               <li>
                    <a href="#">Τροποποίηση Δήλωσης</a>
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
                
                </div>
                <div class="container-fluid">
                    
                    <div class="row">
                    <div class="row">    
                <div class="col-sm">
                <button type="button" id="sidebarCollapse" class="row btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>+</span>
                </button>
                </div>
                <?php
            
                    if(isset($_POST['sh'])){
                        $result=showTeachings($con);
                        ?><table class="table">
                            <thead><tr>
                                    <th scope="col">χρόνος</th>
                                    <th scope="col">εξάμηνο</th>
                                    <th scope="col">βάρος θεωρίας</th>
                                    <th scope="col">βάρος εργαστηρίου</th>
                                    <th scope="col">όριο θεωρίας</th>
                                    <th scope="col">όριο εργαστηρίου</th>
                                    <th scope="col">Μάθημα</th>
                                    <th scope="col">Διδάσκων</th>
                            </tr></thead><tbody><?php
                            while($row= $result->fetch_assoc()){
                                ?><tr>
                                <td><?php print($row['year']); ?></td>
                                <td><?php print($row['semester']); ?></td>
                                <td><?php print($row['weightTheory']); ?></td>
                                <td><?php print($row['weightLab']); ?></td>
                                <td><?php print($row['labLimit']); ?></td>
                                <td><?php print($row['theoryLimit']); ?></td>
                                <td><?php print($row['name']); ?></td>
                                <td><?php print($row['fullname']);?></td>
                            </tr><?php

                            }
                        
                        ?></tbody></table><?php
                    }
                    if(isset($_POST['set'])){
                        if(isset($_POST['theoryWeight']) && !empty($_POST['theoryWeight'])){
                            if(isset($_POST['labWeight']) && !empty($_POST['labWeight'])){
                                if(isset($_POST['Tlimit']) && !empty($_POST['Tlimit'])){
                                    if(isset($_POST['Llimit']) && !empty($_POST['Llimit'])){
                                        $tw = $_POST['theoryWeight'];
                                        $lw= $_POST['labWeight'];
                                        $tl= $_POST['Tlimit'];
                                        $ll= $_POST['Llimit'];
                                        if(isset($_POST['teaching']) && !empty($_POST['teaching'])){
                                            $id= $_POST['teaching'];
                                            setWeightsAndLimits($con,$id,$tw,$lw,$ll,$tl);
                                            ?><p class="alert alert-primary" ><?php print("Η ανάθεση έγινε επιτυχώς"); ?></p><?php
                                        }
                                        
                                    }
                                }
                            }
                        }

                    }
                 ?>
                        <form method="POST">
                        

                        <select style="max-width:40vw" name="teaching" class="form-control form-control-md mt-2">
                            <?php
                            $result = showTeachings($con);
                            while($row = $result->fetch_assoc()){
                                ?><option value="<?php echo($row['id']); ?>"><?php echo($row['fullname']."  ".$row['name']); ?></option><?php
                            }
                            ?>
                        </select>
        
                        <div>
                        <label >βάρος θεωρίας</label>
                        <select style="max-width:40vw" name="theoryWeight" id="" class="form-control">
                            <option value="0.1">10%</option>
                            <option value="0.2">20%</option>
                            <option value="0.3">30%</option>
                            <option value="0.4">40%</option>
                            <option value="0.5">50%</option>
                            <option value="0.6">60%</option>
                            <option value="0.7">70%</option>
                            <option value="0.8">80%</option>
                            <option value="0.9">90%</option>
                            <option value="1">100%</option>
                        </select>
                        </div>
                        <div>
                        <label >βάρος εργαστηρίου</label>
                    <select style="max-width:40vw" name="labWeight" id="" class="form-control">
                            <option value="0.1">10%</option>
                            <option value="0.2">20%</option>
                            <option value="0.3">30%</option>
                            <option value="0.4">40%</option>
                            <option value="0.5">50%</option>
                            <option value="0.6">60%</option>
                            <option value="0.7">70%</option>
                            <option value="0.8">80%</option>
                            <option value="0.9">90%</option>
                            <option value="1">100%</option>
                        </select>
                        </div>
                        <div>
                        <label >όριο θεωρίας</label>
                        
                        <input style="max-width:40vw" name="Tlimit" class="form-control">
                        </div>
                        <div>
                        <label >όριο εργαστηρίου</label>
                        <input style="max-width:40vw" name="Llimit" class="form-control">
                        </div>
                        <button type="submit"  name="set" value="as" class="mt-3 btn btn-info">ενημέρωση</button> 
                        </form>
                        <form method="POST">
                            <button class="btn btn-info" type="submit" name="sh" value="sh" > Εμφάνηση αναθέσεων</button>
                        </form> 
                    </div>


                </div>
                
            </nav>
        </div>
    </div>
</body>
</html>