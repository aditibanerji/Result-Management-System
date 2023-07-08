<?php
include('includes/dbcon.php');
session_start();
$msg=null;
$error=null;

$stid = $_GET['stid'];

 if(isset($_POST['submit']))
 {
   $marks =$_POST['marks'];
   $subjectid = $_POST['subjectid'];

    $sql = "UPDATE result set marks = '$marks'  WHERE student_id='$stid' AND subject_id ='$subjectid' ";
    
    if(mysqli_query($conn,$sql))
    {
        $msg = "Class Updated Successfully";
    }
    else
    {
        $error="Something Went Wrong!";
    }
 }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SRMS Update result</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Lato:wght@300;400&family=Montserrat:wght@200&family=Poppins:wght@300;400&family=Quicksand&family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/new.css">
    <script src="https://kit.fontawesome.com/3e88322b52.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="" >
    <nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SRMS | ADMIN</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-user navbar-right">
            <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> ADMIN </a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<nav class="navbar-primary">
  <a href="dashboard.php" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>

  
  <ul class="navbar-primary-menu">
    <li>
     
    <span ></span>

      <a href="dashboard.php"  ><span class="glyphicon glyphicon-list-alt"></span><span class="nav-label">Dashboard</span></a>
                
      <div class="panel-group">
  <div class="panel ">
    <div class="panel-heading">
      <h3 class="panel-title">
        <a data-toggle="collapse" href="#collapse1"><span class="glyphicon glyphicon-pencil"></span><span class="nav-label">Student Classes</span></a>
      </h3>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body"> <a  href="create_class.php">Create Class</a></div>
      <div class="panel-footer"><a  href="manage_class.php">Manage  Class</a></div>
    </div>
  </div>
</div>

<div class="panel-group">
  <div class="panel ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2"><span class="glyphicon glyphicon-book"></span><span class="nav-label">Subjects</span></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body"> <a  href="create_subject.php">Create Subject</a></div>
      <div class="panel-footer"><a  href="manage_subject.php">Manage Subject</a></div>
      <div class="panel-footer"><a  href="create_subjectcomb.php">Add Subject Combination</a></div>
      <div class="panel-footer"><a  href="manage_subjectcomb.php">Manage Subject Combination</a></div>
    </div>
  </div>
</div>

<div class="panel-group">
  <div class="panel ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse3"><span class="glyphicon glyphicon-user"></span><span class="nav-label">Student </span></a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body"> <a  href="create_student.php">Add Student</a></div>
      <div class="panel-footer"><a  href="manage_student.php">Manage  Student</a></div>
    </div>
  </div>
</div>

<div class="panel-group">
  <div class="panel ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse4"><span class="glyphicon glyphicon-education"></span><span class="nav-label">Result</span></a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body"> <a  href="create_result.php">Add Result</a></div>
      <div class="panel-footer"><a  href="manage_result.php">Manage Result</a></div>
    </div>
  </div>
</div>
  
      <a href="admin_changepw.php"><span class="glyphicon glyphicon-wrench"></span><span class="nav-label">Admin Change Password</span></a>
      
    </li>
  </ul>
</nav>

<div class="main-page">
    <div class="main-content" >
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">
                    Update Student Result
                </h2>
            </div>
        </div>

    </div>
</div>

</div>

<section class="section">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                

                 <?php
                  if($msg){?>

                  <div class="alert alert-success left-icon-alert" role="alert">
                    <strong> Class Updated</strong>

                  </div> <?php }
                  elseif($error){?>

                  <div class="alert alert-danger left-icon-alert" role="alert">
                    <strong>Error!</strong>

                  </div>

                 <?php }?>

                 <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">  

          <?php
          if(isset($_GET['stid']))
          {
            $stid = intval($_GET['stid']);
          }
          else
          {
           // $stid = $studentid;
          }
         
          $sql= "SELECT student.student_name , student.roll_id, student.student_id , classes.class_name , classes.section from student join result on student.student_id = result.student_id join classes on result.class_id = classes.class_id WHERE student.student_id ='$stid' limit 1 ";
          $result = mysqli_query($conn,$sql);
          $count=1;
          if(mysqli_num_rows($result)>0)
          {
            while($row = mysqli_fetch_assoc($result))
            { ?>

<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">  
                   <form  method="POST">
                    
                 
                  <div class="mb-6" id="m">
                        <label for="classname" class="form-label">Class : </label>
                      <?php echo htmlentities($row['class_name']);?>(<?php echo htmlentities($row['section']);?>)
                    </div>


                  <div class="mb-5 mt-5" id="m">
                         <label for="sec" class="form-label">Full Name : </label>
                         <?php echo htmlentities($row['student_name']);?>
                           
                  </div>

                  <div class="mb-5 mt-5" id="m">
                         <label for="sec" class="form-label">Roll Id : </label>
                         <?php echo htmlentities($row['roll_id']);?>
                           
                  </div>


                  <?php  } } ?>   

                  <?php

                  $sql = "SELECT subjects.subject_name , subjects.subject_id , result.marks from subjects join result on subjects.subject_id = result.subject_id WHERE result.student_id ='$stid'";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                       while($row=mysqli_fetch_assoc($result))
                       { ?>

                          <div class="mb-5 mt-5" id="m">
                         <label for="id" class="form-label"><?php echo htmlentities($row['subject_name']);?></label>
                         <input type="hidden" name="subjectid" value="<?php echo htmlentities($row['subject_id'])?>">

                         <input type="text" class="form-control" id="classid" value="<?php echo htmlentities($row['marks']);?>" name="marks">
                           
                  </div>

                       <?php } } ?>
                  <div class="form-group mt-30">
                         <div class="">
                         <button type="submit" class="btn btn-primary" id="s" name="submit" >Update</button>
                         </div>
                 </div>

     </form>
  </div>
                
             

                
      

            </div>
        </div>

    </div>

    </div>
           
</section>


       
       
       </div>
<script>
       $('.btn-expand-collapse').click(function(e) {
				$('.navbar-primary').toggleClass('collapsed');
});
</script>
       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   

       
    </body>
</html>