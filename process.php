<?php
 include 'database.php';
 //check if form was submited
 if(isset($_POST['submit'])){
  $user = mysqli_real_escape_string($con,$_POST['user']);//Remove any harmfull data enter by the user
  $message = mysqli_real_escape_string($con,$_POST['message']);

  //set Timezone
  date_default_timezone_set("America/New_York");
  $time=date('h:i:s a',time());//Give us the current time

  //Validate
   if(!isset($user) || $user=='' || !isset($message) ||$message==''){
     $error = "Please fill in your name and a message";
     header("Location: index.php?error=".urlencode($error));//To send the error to the page 
     exit();
   }
   else{
   $query="INSERT INTO shouts (user,message,time)
   VALUES('$user','$message','$time')";

   if(!mysqli_query($con,$query)){//if it dosn't so insertion
    die('Error: '.mysqli_error($con));
   }
   else{ //if it inserted
     header("Location: index.php");
     exit();
   }
   }
 }
?>