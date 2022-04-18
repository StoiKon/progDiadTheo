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
               <li class="active">
                    <a href="searchLesson.php">Αναζήτηση μαθήματος</a>
               </li>
               <li>
                    <a href="assignTeacher.php">Ανάθεση Διδασκαλίας</a>
               </li>
               <li><a href="#">Διαχείρηση Διδασκαλίας</a></li>
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
                    <a href="#">Εισαγωγή Δήλωσης</a>
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
                    <div>
                    <form method="POST">
                        <button type="submit" id="showLessons" class="btn btn-info mt-2 mx-3" name="b" value="s">Εμφάνηση μαθημάτων</button>
                    </form>
                    </div>
                    <div>
                        <form method="POST">
                            <div class="mb-1 mt-2 form-group">
                            <label for="title" class="form-label w-auto">Τίτλος μαθήματος</label>
                            <input name="title" type="text" class="form-control " id="lpassword" required>
                            </div>  
                            <button type="submit" name="search" id="addLessonsForm" class="btn btn-info mt-2 mx-3" >Αναζήτηση</button>
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['b'])){
                        $result=showLessons($con);
                        ?><form method="POST"><table class="table">
                            <thead><tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Descrition</th>
                                    <th scope="col">semester</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                            </tr></thead><tbody><?php
                            while($row= $result->fetch_assoc()){
                                ?><tr>
                                <td><?php print($row['name']); ?></td>

                                <td><?php print($row['description']); ?></td>
                                <td><?php print($row['semester']);?></td>
                                <td><button name="edit" type="submit" value="<?php echo($row['id']);?>" class="btn btn-primary">edit</button></td>
                                <td><button name="delete" type="submit" value="<?php echo($row['id']);?>" class="btn btn-primary">delete</button></td>
                            </tr><?php

                            }
                        
                        ?></tbody></table></form><?php
                    }
                    if(isset($_POST['search']) && isset($_POST['title']) && !empty($_POST['title'])){
                        $result=searchLesson($con,$_POST['title']);
                        ?><form method="POST"><table class="table">
                            <thead><tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Descrition</th>
                                    <th scope="col">semester</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                            </tr></thead><tbody><?php
                            while($row= $result->fetch_assoc()){
                                ?><tr>
                                <td><?php print($row['name']); ?></td>

                                <td><?php print($row['description']); ?></td>
                                <td><?php print($row['semester']);?></td>
                                <td><button name="edit" type="submit" value="<?php echo($row['id']);?>" class="btn btn-primary">edit</button></td>
                                <td><button name="delete" type="submit" value="<?php echo($row['id']);?>" class="btn btn-primary">delete</button></td>
                            </tr><?php

                            }
                        
                        ?></tbody></table></form><?php
                    }
                    if(isset($_POST['delete'])){ 
                        $id=$_POST['delete'];
                        delLesson($con,$id);
                        ?><p class="alert alert-primary">lesson deleted successfully</p><?php
                    }
                    if(isset($_POST['edit'])){ 
                        $id=$_POST['edit'];
                        $result=getLesson($con,$id);
                        $row = $result->fetch_assoc();
                        ?>
                        <div id="addL" style="width:60vw;max-width:600px" class="h-25 p-3 mt-5 mx-auto px-auto">
                    <form id="addForm" method="POST">
                    <div class="mb-1 mt-2 form-group">
                        <label for="title" class="form-label w-auto">Τίτλος μαθήματος</label>
                        <input name="title" value="<?php echo($row['name']);?>" type="text" class="form-control " id="lpassword" required>
                    </div>
                    <div class="mb-1 mt-2 form-group">
                        <label for="inputPassword"  class="form-label w-auto">Περιγραφή μαθήματος</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"> <?php echo($row['description']) ?></textarea>
                    </div>
                    <script>
                        $("#semester").ready(function(){
                            $("#semester").val("<?php echo($row['semester']);?>");
                        });
                    </script>
                    <div class="form-group mt-2">
                <label>Εξάμηνο</label>  
                <select  id="semester" name="semester" value="<?php echo($row['semester']);?>" class="form-control form-control-md">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <input name="id" value="<?php echo($id)?>" class="hidden">
                    <button type="submit" name="update" id="addLessonsForm" class="btn btn-info mt-2 mx-3" >αλλαγή</button>
                </form>
                    </div>
                        <?php
                    }
                    if(isset($_POST['update'])){
                        if(isset($_POST['title']) && !empty($_POST['title'])){
                            if(isset($_POST['description']) && !empty($_POST['description'])){
                                if(isset($_POST['semester']) && !empty($_POST['semester'])){
                                    if(isset($_POST['id']) && !empty($_POST['id'])){
                                        $id = $_POST['id'];
                                        $semester= $_POST['semester'];
                                        $description=$_POST['description'];
                                        $name=$_POST['title'];
                                        updateLesson($con,$id,$semester,$description,$name);
                                    }
                                }
                            }
                        }

                    }
                    
                    
                    ?>
                    </div>


                </div>
                
            </nav>
        </div>
    </div>
</body>
</html>