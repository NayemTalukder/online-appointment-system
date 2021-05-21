
<?php
  if (empty($_SESSION['appointment-date'])) {
    $_SESSION['appointment-date'] = $_SESSION['prev_appointment_date'];
    $res = $model->editAppointment();
    if ($res) $_SESSION['message'] = "<script>alert('Appointment has been Updated.')</script>";

    header("Location: ../View/admin/appointment-list.php");
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
      header("Location: ../View/admin/appointment-list.php");
    } else {
      $res = $model->editAppointment();
      if ($res) $_SESSION['message'] = "<script>alert('Appointment has been Updated.')</script>";

      header("Location: ../View/admin/appointment-list.php");
    }
  }