<?php 
  session_start();
  if (!isset($_SESSION['loggedIn'])) header("Location: index.php");
  
  include('header.php');
  include('nav.php');
  include("../../Controller/mechanicListViewController.php");

  if (isset($_SESSION['loggedIn'])) {
    if(!$_SESSION['loggedIn']) header("Location: index.php");
  }
  $_SESSION['mechanic_id'] = $_POST['mechanic'];
  include("../../Controller/getMechanicController.php");
  $mechanic_row = mysqli_fetch_assoc($selected_mechanic);
?>

<div class="container-y">
  <div class="py-2 w-50 mx-auto">
    <div class="bg-p d-flex center">
        <h4 class="card-title text-white my-1 font-2">Edit Appointment</h4>
    </div>
    <form class="mt-1 form-text" action="../../Controller/editAppointentController.php" method="POST" >
      <!-- ID -->
      <input name="id" class="d-none" type="text" value="<?php echo $_POST['id'] ?>" >
      <!-- Prev Mechanic -->
      <input name="prev_mechanic" class="d-none" type="text" value="<?php echo $mechanic_row['id'] ?>" >
      <!-- Prev Appointment date -->
      <input name="prev_appointment_date" class="d-none" type="text" value="<?php echo $_POST['appointment_date'] ?>" >
      <!-- Appointment date -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="appointment-date" class="" >Appointment date</label>
        </div>
        <input type="text" name="appointment-date" class="form-control" placeholder="<?php echo $_POST['appointment_date'] ?>" >
      </div>
      <!-- Mechanic Name -->
      <div>
        <div class="w-100 center bg-p text-white">
          <label for="mechanic-name" class="" >Mechanic Name</label>
        </div>
        <select name="mechanic" class="form-control cursor-pointer" >
            <option value=<?php echo $mechanic_row['id'] ?> >
              <?php echo $mechanic_row['name'] ?> (Availability: <?php echo $mechanic_row['availability'] ?>)
            </option>

            <?php while($rows = mysqli_fetch_assoc($result)) { ?>
              <option value=<?php echo $rows['id'] ?> >
                <?php echo $rows['name'] ?> (Availability: <?php echo $rows['availability'] ?>)
              </option>
            <?php } ?>
        </select>
      </div>

      <!-- Submit -->
      <div class="sign-info text-center">
        <button type="submit" class="btn btn-primary w-100 mt-1 text-white">Edit Appointment</button>
      </div>
    </form>
  </div>
</div>

<?php include('../footer.php') ?>
<script>navHighlight('appointment-list')</script>