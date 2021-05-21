<?php 
  session_start();
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }

  include('header.php');
?>

<div class="h-100 center">
  <div class="w-50 mx-auto">
    <div class="bg-p d-flex center">
        <h4 class="card-title text-white my-1 font-2">Check Appointment</h4>
    </div>
    <form class="mt-1 form-text" action="../Controller/checkAppointentController.php" method="POST" >
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="car-engine-number" >Car engine number</label>
        </div>
          <input type="text" name="car_engine" class="form-control" placeholder="Car engine number" >
      </div>
      <!-- Submit -->
      <div class="sign-info text-center">
        <button type="submit" class="btn btn-primary w-100 mt-1 text-white">Check Appointment</button>
      </div>
    </form>
  </div>
</div>
<?php include('footer.php') ?>
<script>navHighlight('check-appointment')</script>