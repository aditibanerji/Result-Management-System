<?php
include('includes/dbcon.php');
session_start();
$msg=null;
$error=null;

 if(isset($_POST['submit']))
 {
    $class = $_POST['class'];
    $studentid = $_POST['studentname'];
    $subject = $_POST['subject'];
  $marks =$_POST['marks'];
   
  $sql="SELECT subject_id from subjects_combination WHERE subject_id ='$subject' AND class_id='$class'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
      {
       
  
      $sql2= "INSERT into result(student_id,class_id,subject_id,marks) VALUES('$studentid','$class','$subject','$marks')";
      if(mysqli_query($conn,$sql2))
      {
        $msg="added";
      }
      else
      {
        $error="error!";
      }
  
    
 }
 else
 {
       $error="error! class-subject combination not valid!";
 }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SRMS Create Result</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Lato:wght@300;400&family=Montserrat:wght@200&family=Poppins:wght@300;400&family=Quicksand&family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/new.css">
    <script src="https://kit.fontawesome.com/3e88322b52.js" crossorigin="anonymous"></script>   
    
    <script type="text/javascript">
           
           function ajaxfunction()
           {

           
           var httpxml;
           try{
              httpxml = new XMLHttpRequest();
           }
           catch(e)
           {
              try {
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
           }


           function stateck()
           {
                if(httpxml.readyState===4)
                {
                    var myarray = JSON.parse(httpxml.responseText);
                    console.log(myarray);

                    for(j=document.testform.studentname.options.length-1;j>=0;j--)
                    {
                    document.testform.studentname.remove(j);
                     }

                     for (i=0;i<myarray.data.length;i++)
                    {
var optn = document.createElement("OPTION");
                        
                 
 
optn.text = myarray.data[i][0];
optn.value = myarray.data[i][1];  
// You can change this to subcategory 
document.testform.studentname.options.add(optn);

} 
                }

              /*  if(httpxml.readyState===4)
                {
                    var myarray2 = JSON.parse(httpxml.responseText);
                    console.log(myarray2);

                    for(j=document.testform.subject.options.length-1;j>=0;j--)
                    {
                    document.testform.subject.remove(j);
                     }

                     for (i=0;i<myarray2.data2.length;i++)
                    {
var optn = document.createElement("OPTION");
                        
                 
 
optn.text = myarray2.data2[i][0];
optn.value = myarray2.data2[i][1];  
// You can change this to subcategory 
document.testform.subject.options.add(optn);

} 
                }*/
           }

          var url ="dd.php";
           var cat_id=document.getElementById('s1').value;
url=url+"?cat_id="+cat_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;

httpxml.open("GET",url,true);
httpxml.send(null);  


/*
var url ="dd.php";
           var cat_id=document.getElementById('s1').value;
url=url+"?cat_id="+cat_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;

httpxml.open("GET",url,true);
httpxml.send(null);*/

            

        }

       

    </script>

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
                   Add student Result
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
                    <strong> Result Added </strong>

                  </div> <?php }
                  elseif($error){?>

                  <div class="alert alert-danger left-icon-alert" role="alert">
                    <strong><?php echo($error);?></strong>

                  </div>

                 <?php }?>

                 <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">  
                   <form name="testform" action="create_result.php" method="POST">
                    
                 
                  <div class="mb-6" id="m">
                        <label for="class" class="form-label">Class</label>
                        <select name="class" class="form-control clid" id="s1" onchange="ajaxfunction();" required="required">
                      <option value="">Select Class</option>

                      <?php
                      $sql= "SELECT * from classes";
                      $result = mysqli_query($conn,$sql);

                      if(mysqli_num_rows($result)>0)
                      {         
                            while($row=mysqli_fetch_assoc($result))
                            { ?>

                                <option value="<?php echo htmlentities($row['class_id']);?>"> <?php echo htmlentities($row['class_name']);?> &nbsp; - <?php echo htmlentities($row['section']);?></option>

                            <?php }}?>
                    
                    </select>
                    </div>


                  <div class="mb-5 mt-5" id="m">
                         <label for="studentname" class="form-label">Student Name</label>
                         <select name="studentname" class="form-control stid" id="s2" required="required" >
                         </select>
                           
                  </div>

                 


                  <div class="mb-5 mt-5" id="m">
                  <label for="subject" class="form-label">Subject</label>
                         <select name="subject" class="form-control stid" id="s3" required="required" >
                         <option value="">Select Class</option>
                         <?php
                         $sql="SELECT * from subjects";
                         $result=mysqli_query($conn,$sql);
                         while($row = mysqli_fetch_assoc($result))
                         {?>
                           
                           <option value="<?php echo htmlentities($row['subject_id']);?>"> <?php echo htmlentities($row['subject_name']);?></option>
                        <?php }?>
                            </select>
                         </div>

                         <div class="mb-5 mt-5" id="m">
                         <label for="marks" class="form-label">Marks</label>
                         <input type="text" class="form-control" id="marks" placeholder="Enter Marks out of 100" name="marks">
                    
                           
                  </div>
                       
                  </div>


                  <div class="form-group  ">
                         <div class="">
                         <button type="submit" class="btn btn-primary"  name="submit" style="margin-left:15px">Declare Result</button>


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