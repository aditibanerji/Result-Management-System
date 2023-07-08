<?php
include('includes/dbcon.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SRMS Manage Subject</title>
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
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> ADMIN </a></li>
            <li><a href="#about"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<nav class="navbar-primary">
  <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>

  
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
                    Manage Subjects
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
                <div class="panel-body p-20">
                    <table id="ex" class="display table table-striped table-bordered" cellspacing="0" width="100">

                    <thead>
                          <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>

  <?php
   $sql = "SELECT * from subjects ORDER BY subject_name DESC";
   $result = mysqli_query($conn,$sql);
   $count=1;

   if(mysqli_num_rows($result)>0)
   { 
        while($row = mysqli_fetch_assoc($result))
        {?>

         <tr>
               <td> <?php echo htmlentities($count);?></td>
               <td><?php echo htmlentities($row['subject_name']);?></td>
               <td><?php echo htmlentities($row['subject_id']);?></td>
               <td> <a href="edit_subject.php?subjectid=<?php echo htmlentities($row['subject_id']);?>"><i class="fa fa-edit" title="Edit Record"></i></a></td>
         </tr>

   <?php $count++;     }  }?>



                    </tbody>
                    </table>

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