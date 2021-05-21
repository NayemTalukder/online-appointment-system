<?php
  class Model {
    // Create Queries
    public function createAppointment() {
      include('connect.php');
      $name = $_SESSION['name'];
      $address = $_SESSION['address'];
      $phone = $_SESSION['phone'];
      $car_license_number = $_SESSION['car-license-number'];
      $car_engine_number = $_SESSION['car-engine-number'];
      $appointment_date = $_SESSION['appointment-date'];
      $mechanic = $_SESSION['mechanic'];

      $query = "INSERT INTO appointment (id, name, address, phone, car_license, car_engine, appointment_date, mechanic) VALUES (NULL, '$name','$address', $phone, '$car_license_number', $car_engine_number, '$appointment_date', $mechanic)";
      return mysqli_query($con, $query);
    }
    public function createGetHelp() {
      include('connect.php');
      $name = $_SESSION['name'];
      $phone = $_SESSION['phone'];
      $problem = $_SESSION['problem'];
      
      $query = "INSERT INTO get_help (id, name, phone, problem) VALUES (NULL, '$name','$phone', '$problem')";
      return mysqli_query($con, $query);
    }

    // Edit Query
    public function editAppointment() {
      include('connect.php');
      $id = $_SESSION['id'];
      $appointment_date = $_SESSION['appointment-date'];
      $mechanic = $_SESSION['mechanic'];
      $query = "UPDATE appointment SET appointment_date = '$appointment_date', mechanic = $mechanic WHERE id = $id";
      return mysqli_query($con, $query);
    }
    public function editMechanic($mechanic_id, $operation) {
      include('connect.php');
      $mechanic = $this -> getMechanic($mechanic_id);
      $mechanic_rows = mysqli_fetch_assoc($mechanic);
      if ($operation) $updated_availability = $mechanic_rows['availability'] - 1;
      else $updated_availability = $mechanic_rows['availability'] + 1;
      $query = "UPDATE mechanic SET availability = $updated_availability WHERE id = $mechanic_id";
      mysqli_query($con, $query);
    }
    
    // Login Query
    public function login() {
      session_start();
      include('connect.php');
      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    
      //User validation
      $user_check_query = "SELECT * FROM admin WHERE email = '$email' AND pass ='$password' LIMIT 1";
      $results = mysqli_query($con, $user_check_query);
      $user = mysqli_fetch_assoc($results);
      return $user;
    }
    
    // View Queries
    public function appointmentListView() {
      include('connect.php');
      $query = "SELECT * from appointment";
      return mysqli_query($con, $query);
    }
    public function mechanicListView() {
      include('connect.php');
      $query = "SELECT * from mechanic";
      return mysqli_query($con, $query);
    }
    public function helpListView() {
      include('connect.php');
      $query = "SELECT * from get_help";
      return mysqli_query($con, $query);
    }
    
    public function getAppointent($reg) {
      include('connect.php');
      $query = "SELECT * FROM appointment WHERE car_engine = $reg LIMIT 1";
      return mysqli_query($con, $query);
    }
    public function getMechanic($id) {
      include('connect.php');
      $query = "SELECT * FROM mechanic WHERE id = $id LIMIT 1";
      return mysqli_query($con, $query);
    }
  }