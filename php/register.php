<?php
include 'db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$sql="INSERT INTO students(name,email,phone) VALUES('$name','$email','$phone')";
if(mysqli_query($conn,$sql)){
 echo "Registration Successful!";
}else{
 echo "Error!";
}
?>