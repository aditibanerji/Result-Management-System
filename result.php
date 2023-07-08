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
        <title>Student Result Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Lato:wght@300;400&family=Montserrat:wght@200&family=Poppins:wght@300;400&family=Quicksand&family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/result.css">
    </head>
    <body>
        <div class="main-wrapper">
            <div class="container-fluid mb-20">
                <div class="col-md-12 text-center">
                     <h2 class="title" align="center">Result Management System <img src="pngtree-school-logo-design-png-image_6524414.png" style="width:65px" class="img-responsive"></h2>
                </div>
            </div>
           

            <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2 ">

                    <?php
                     
                     $rollid = $_POST['rollid'];
                     $classid=$_POST['class'];
                     $_SESSION['rollid']=$rollid;
                     $_SESSION['class']=$classid;

                    

                     $sql = "SELECT   student.student_name, student.roll_id, student.student_id, classes.class_name,classes.section from student join classes on classes.class_id=student.class_id where student.roll_id='$rollid' and student.class_id=$classid ";
                     $result = mysqli_query($conn,$sql);
                     if(mysqli_num_rows($result)>0)
                     {
                       
                        while($row = mysqli_fetch_assoc($result))
                        {?>

                        <p><b>Student Name :</b>  <?php echo htmlentities($row['student_name']); ?></p>
                        <p><b>Student Roll Id :</b>  <?php echo htmlentities($row['roll_id']); ?></p>
                        <p><b>Student Class :</b>  <?php echo htmlentities($row['class_name']); ?></p>

                       <?php } ?>
  
                             </div>

                             <div class="panel-body p-20">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Marks</th>
                                        </tr>
                                    </thead>

                                    <tbody>

 <?php 
 $sql = "  SELECT t.student_name , t.roll_id , t.class_id , t.marks , t.subject_id ,subjects.subject_name FROM (SELECT s.student_name , s.roll_id , s.class_id , r.marks , r.subject_id from student as s join result as r on s.student_id = r.student_id) as t join subjects on t.subject_id = subjects.subject_id WHERE (t.roll_id = '$rollid' AND t.class_id='$classid')";
 $result = mysqli_query($conn,$sql);
 $totalcount=0;
 $count=1;
 if(mysqli_num_rows($result)>0)
 {
      while($row=mysqli_fetch_assoc($result))
      { ?>

                  <tr>
                    <th scope="row"><?php echo htmlentities($count)?> </th>
                    <td><?php echo htmlentities($row['subject_name']);?></td>
                    <td><?php echo htmlentities($row['marks']);?></td>
                  </tr>

            <?php
            $totalcount += $row['marks'];
            $count++;} ?>

            <tr>
                  <th scope="row" colspan="2">Total Marks</th>
                  <td><b><?php echo htmlentities($totalcount);?></b> out of <b><?php echo htmlentities(($count-1)*100);?></b></td>
            </tr>

            <tr>
                <th scope="row" colspan="2">Percentage</th>
                <td><b><?php echo htmlentities($totalcount*(100)/(($count-1)*100))?>%</b></td>
            </tr>
            <tr>
                 <th scope="row" colspan="2">Download Result</th>
                 <td><b><a href="">Download</a></b></td>
            </tr>
<?php }else { ?>

    <div class="alert alert-warning left-icon-alert" role="aler">
         <strong>ERROR!</strong><p>Your Result Not Declared Yet</p>
<?php } ?>

    </div>

    <?php } else { ?>

<div class="alert alert-danger left-icon-alert" role="alert">
   <strong>ERROR! </strong><?php echo htmlentities("Invalid Roll Id");
}?>

</div>
                                    
 
                                  </tbody>
                                </table>

                             </div>
                    
                            <div class="form-group">
                                <div class="col-cm-6">
                                    <a href="index.php">Back To Home</a>

                                </div>

                            </div>
         

                  </div>
            </div>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>
</html>