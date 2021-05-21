<?php
  session_start();
  include('controller.php');

  $_SESSION['id'] = $_POST['id'];
  $_SESSION['appointment-date'] = $_POST['appointment-date'];
  $_SESSION['prev_appointment_date'] = $_POST['prev_appointment_date'];
  $_SESSION['mechanic'] = $_POST['mechanic'];
  $_SESSION['prev_mechanic'] = $_POST['prev_mechanic'];
  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>";

  if($_SESSION['mechanic'] != $_SESSION['prev_mechanic']) {
    // Check mechanic availability
    $isMechanicAvailale = $model->getMechanic($_SESSION['mechanic']);
    $mechanic_row = mysqli_fetch_assoc($isMechanicAvailale);
    $mechanic_availability = $mechanic_row['availability'];
    if($mechanic_availability <= 0) {
      $_SESSION['message'] = "<script>alert('Your selected mechanic is already occupied. Please select another one.')</script>";
      header("Location: ../View/admin/appointment-list.php");
    } else {
      $model->editMechanic($_SESSION['mechanic'], TRUE);
      $model->editMechanic($_SESSION['prev_mechanic'], FALSE);
      include('editAppointentController2.php');
    }
  } else include('editAppointentController2.php');

