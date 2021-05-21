<?php 
  session_start();
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
?>
<?php include('header.php') ?>
<?php include("../Controller/mechanicListViewController.php"); ?>

<div class="container-y">
  <div class="py-2 w-50 mx-auto">
    <div class="bg-p d-flex center">
        <h4 class="card-title text-white my-1 font-2">Get Appointment</h4>
    </div>
    <form class="mt-1 form-text" action="../Controller/createAppointmentController.php" method="POST" >
      <!-- Name -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="name" class="" >Name</label>
        </div>
        <input type="text" name="name" class="form-control" placeholder="Name" >
      </div>
      <!-- Address -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="address" class="" >Address</label>
        </div>
        <textarea name="address" class="form-control" placeholder="Address" ></textarea>
      </div>
      <!-- Phone -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="phone" class="" >Phone</label>
        </div>
        <input type="text" name="phone" class="form-control" placeholder="Phone" >
      </div>
      <!-- Car License number -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="car-license-number" class="" >Car License number</label>
        </div>
        <input type="text" name="car-license-number" class="form-control" placeholder="Car License number" >
      </div>
      <!-- Car Engine number -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="car-engine-number" class="" >Car Engine number</label>
        </div>
        <input type="text" name="car-engine-number" class="form-control" placeholder="Car Engine number" >
      </div>
      <!-- Appointment date -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="appointment-date" class="" >Appointment date</label>
        </div>
        <input id="date-picker" type="text" name="appointment-date" class="form-control" placeholder="y-m-d" >
      </div>
      <!-- Mechanic Name -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="mechanic-name" class="" >Mechanic Name</label>
        </div>
        <select name="mechanic" class="form-control cursor-pointer" >
          <option value=0 >Select mechanic:</option>
          <?php while($rows = mysqli_fetch_assoc($result)) { ?>
            <option value=<?php echo $rows['id'] ?> >
              <?php echo $rows['name'] ?> (Availability: <?php echo $rows['availability'] ?>)
            </option>
          <?php } ?>
        </select>
      </div>

      <!-- Submit -->
      <div class="sign-info text-center">
        <button type="submit" class="btn btn-primary w-100 mt-1 text-white">Get Appointment</button>
      </div>
    </form>
  </div>
</div>

<?php include('footer.php') ?>
<script>navHighlight('get-appointment')</script>