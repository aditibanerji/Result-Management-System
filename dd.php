<?php
include('includes/dbcon.php');

$cat_id=$_GET['cat_id'];

if(!is_numeric($cat_id)){
    echo "Data Error";
    exit;
     }


   
$sql="select student_name,student_id from student where class_id='$cat_id'";
$row=mysqli_query($conn,$sql);
$result=mysqli_fetch_all($row);

$main = array('data'=>$result);
echo json_encode($main);


/*
$sql2="select subjects.subject_name from subjects_combination JOIN subjects on subjects.subject_id=subjects_combination.subject_id where subjects_combination.class_id='$cat_id'";
$row2=mysqli_query($conn,$sql2);
$result2=mysqli_fetch_all($row2);

$main2 = array('data2'=>$result2);
echo json_encode($main2);

*/


?>