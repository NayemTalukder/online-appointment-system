<?php 
  session_start();
  include('controller.php');
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $user = $model->login();
  //Confirmation
  if($user){
    $_SESSION['loggedIn'] = true;
    header("Location: ../View/admin/home.php");
  }else{
    header("Location: ../View/admin");
  }
  return;
?>
