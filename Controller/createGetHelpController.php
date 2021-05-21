<?php
  session_start();
  include('controller.php');

  $_SESSION['name'] = $_POST['name'];
  $_SESSION['phone'] = $_POST['phone'];
  $_SESSION['problem'] = $_POST['problem'];
  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>"; 

  $res = $model->createGetHelp();
  if ($res) $_SESSION['message'] = "<script>alert('Your request recorded. We will reach you shortly.')</script>";
  
  header("Location: ../View/index.php");