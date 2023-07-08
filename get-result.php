<?php
include('includes/dbcon.php');
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
  <body>
           <div class="container min-vh-100 d-flex justify-content-center align-items-center">  
                   <form action="result.php" method="POST">
                       
                     <div class="mb-3">
                        <h2>Student Result Management System</h2>
                     </div>
                 
                  <div class="mb-3">
                        <label for="rollid" class="form-label">Enter Your Roll Id</label>
                        <input type="text" class="form-control" id="rollid" placeholder="Enter Roll Id" name="rollid">
                    </div>


                  <div class="mb-3">
                         <label for="class" class="form-label">Select Class</label>
                         <select name="class" class="form-control" id="class" required="required" >
                            <option value="">Select Class</option>

                            <?php $sql = 'SELECT * FROM classes';
                            $result = mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result)>0)
                            {
                                 while($row = mysqli_fetch_assoc($result))
                                 {?>

                                 <option value="<?php echo htmlentities($row['class_id']) ?>"><?php echo htmlentities($row['class_name']);?>&nbsp; - <?php echo htmlentities($row['section']); ?> </option>

                                <?php }}?>
                            

                         </select>
                  </div>

                  <div class="form-group mt-20">
                         <div class="">
                         <button type="submit" class="btn btn-primary">Search</button>


                         </div>
                 </div>

                 <div class="col-sm-6 home">
                      <a href="index.php">Back to Home</a>
                    </div>



     </form>
  </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>