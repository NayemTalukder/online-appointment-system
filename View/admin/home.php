<?php 
  session_start();
  if (!isset($_SESSION['loggedIn'])) header("Location: index.php");
  
  include('header.php');
  include('nav.php');
?>

<div class="row center w-80 mx-auto my-auto h-100">
    <a class="col link-secondary bg-s center mr-2 mb-3 px-3 h-35" href="appointment-list.php" >
        <h4 class="text-center text-white font-2">Appointment List</h4>
    </a>
    
    <a class="col link-secondary bg-s center mr-2 mb-3 px-3 h-35" href="mechanic-list.php" >
        <h4 class="text-center text-white font-2">Mechanic List</h4>
    </a>
    
    <a class="col link-secondary bg-s center px-3 mb-3 h-35" href="help-request-list.php" >
        <h4 class="text-center text-white font-2">Help Request List</h4>
    </a>
</div>

<?php include('../footer.php') ?>