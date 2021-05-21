<?php
  session_start();
  include('controller.php');
  
  $_SESSION['car_engine'] = $_POST['car_engine'];
  $_SESSION['message'] = "<script>alert('You don't have an appointment.')</script>";

  $res = $model->getAppointent($_SESSION['car_engine']);
  if ($res) {
    $appointment_row = mysqli_fetch_assoc($res);
    $appointment_date = $appointment_row['appointment_date'];
    if ($appointment_date) {
      $_SESSION['message'] = "<script>alert('Your appointment date is $appointment_date')</script>";
    }
  }

  header("Location: ../View/check-appointment.php");

  