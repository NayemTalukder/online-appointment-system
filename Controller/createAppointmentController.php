<?php
  session_start();
  include('controller.php');

  $_SESSION['name'] = $_POST['name'];
  $_SESSION['address'] = $_POST['address'];
  $_SESSION['phone'] = $_POST['phone'];
  $_SESSION['car-license-number'] = $_POST['car-license-number'];
  $_SESSION['car-engine-number'] = $_POST['car-engine-number'];
  $_SESSION['appointment-date'] = $_POST['appointment-date'];
  $_SESSION['mechanic'] = $_POST['mechanic'];
  $_SESSION['message'] = "<script>alert('Something went wrong.')</script>";

  // Form Validation
    // Check Void
  if (empty($_SESSION['name']) || empty($_SESSION['phone']) || empty($_SESSION['car-license-number']) || empty($_SESSION['car-engine-number']) || empty($_SESSION['appointment-date']) ) {
    $_SESSION['message'] = "<script>alert('name, phone, car license number, car engine number, appointment date these fields cannot be left empty.')</script>";
    header("Location: ../View/get-appointment.php");
    // Check Numeric
  } else if (!is_numeric($_SESSION['phone']) || !is_numeric($_SESSION['car-engine-number']) )  {
    $_SESSION['message'] = "<script>alert('phone, car engine number these fields only accepts numeric value .')</script>";
    header("Location: ../View/get-appointment.php");
    // Check Date
  } else {
    $date = explode( '-', $_SESSION['appointment-date'] );
    $date_format_mismatch = FALSE;
    if (count($date) != 3) $date_format_mismatch = TRUE;
    else {
      if (strlen($date[0]) != 4) $date_format_mismatch = TRUE;
      else if (!(strlen($date[1]) <= 2 && $date[1] <= '12')) $date_format_mismatch = TRUE;
      else if (strlen($date[2]) <= 2) {
        if (
            $date[1] == '4' || $date[1] == '04' ||
            $date[1] == '6' || $date[1] == '06' ||
            $date[1] == '9' || $date[1] == '09' ||
            $date[1] == '11'
          ) {
            if ($date[2] > '30') $date_format_mismatch = TRUE;
          } else if ($date[1] == '2' || $date[1] == '02') {
            if ($date[2] > '28') $date_format_mismatch = TRUE;
          } else if ($date[2] > '31') $date_format_mismatch = TRUE;
      } else $date_format_mismatch = TRUE;
    }
    if ($date_format_mismatch) {
      $_SESSION['message'] = "<script>alert('Date format mismatched. Please use this (y-m-d) one')</script>";
      header("Location: ../View/get-appointment.php");
    } else {
      // Chekck mechanic availability
      $isMechanicAvailale = $model->getMechanic($_SESSION['mechanic']);
      $mechanic_row = mysqli_fetch_assoc($isMechanicAvailale);
      $mechanic_availability = $mechanic_row['availability'];
      if($mechanic_availability <= 0) {
        $_SESSION['message'] = "<script>alert('Your selected mechanic is already occupied. Please select another one.')</script>";
        header("Location: ../View/get-appointment.php");
      } else {
        // Chekck Previous appointment on same date
        $isAppointmentPresent = $model->getAppointent($_SESSION['car-engine-number']);
        if ($isAppointmentPresent) {
          $appointment_row = mysqli_fetch_assoc($isAppointmentPresent);
          $appointment_date = $appointment_row['appointment_date'];
          if ($appointment_date == $_SESSION['appointment-date']) {
            $_SESSION['message'] = "<script>alert('You already have an appointment on $appointment_date.')</script>";
            header("Location: ../View/index.php");
          } else {
          // Call create function
              $res = $model->createAppointment();
    
              if ($res) {
                $model->editMechanic($_SESSION['mechanic'], TRUE);
                $_SESSION['message'] = "<script>alert('Your appointment has been scheduled.')</script>";
                header("Location: ../View/index.php");
              } else header("Location: ../View/get-appointment.php");
          }
        } else {
          // Call create function
          $res = $model->createAppointment();

          if ($res) {
            $model->editMechanic($_SESSION['mechanic'], TRUE);
            $_SESSION['message'] = "<script>alert('Your appointment has been scheduled.')</script>";
            header("Location: ../View/index.php");
          } else header("Location: ../View/get-appointment.php");
        }
      }
    }
  }
