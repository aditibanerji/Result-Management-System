<?php
include('includes/dbcon.php');
?>
<?php
session_start();
if($_SESSION['alogin']!='')
{
    $_SESSION['alogin']='';
}

 if(isset($_POST['submit']))
 {
    $user=$_POST['user'];
    $pw=$_POST['pw'];

    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$pw'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)===1)
    {
        $_SESSION['alogin']=$_POST['user'];
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        header("Location: index.php?error=Incorect User name or password");
        exit();
    }
   
   
 
 }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&family=Lato:wght@300;400&family=Montserrat:wght@200&family=Poppins:wght@300;400&family=Quicksand&family=Roboto+Mono&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
  </head>
  <body >
                
                 
           <div class="container  d-flex justify-content-center align-items-center " style="margin-top: 90px; position:fixed ; margin-left:60px">  
                   <div>
                       
                     <div class="mb-3">
                        <h5 style="font-style: italic;">For Students</h5>
                     </div>
                 
                  <div class="mb-3">
                        <label for="search" class="form-label">Search Result</label>
                       
                    </div>

                  <div class="form-group mt-20">
                         <div class="">
                         <button  class="btn btn-primary"><a href="get-result.php" style="text-decoration: none; color:white">Search</a></button>


                         </div>
                 </div>

                 

                    <form action="index.php" method="POST">

                    <?php
                       if(isset($_GET['error']))
                       {?>
                           <div class="alert alert-danger left-icon-alert" role="alert" style="margin-top: 10px;">
                    <strong><?php echo htmlentities($_GET['error']);?></strong>

                  </div>

                       <?php } ?>
                       
                       <div class="mb-3" style="margin-top: 90px;">
                          <h5 style="font-style: italic;">For Admin</h5>
                       </div>
                   
                    <div class="mb-3">
                          <label for="user" class="form-label">Enter Username</label>
                          <input type="text" class="form-control" id="user" placeholder="Enter UserName" name="user">
                      </div>

                      <div class="mb-3">
                          <label for="pw" class="form-label">Enter Password</label>
                          <input type="password" class="form-control" id="pw" placeholder="Enter Password" name="pw">
                      </div>
  
  
              
  
                    <div class="form-group mt-20">
                           <div class="">
                           <button type="submit" class="btn btn-success" name="submit">Login</button>
  
  
                           </div>
                   </div>
  
        
  
                 </form>
 


     </div>
  </div>

  <div class="container min-vh-100 d-flex justify-content-center align-items-center">  
                  
  </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>