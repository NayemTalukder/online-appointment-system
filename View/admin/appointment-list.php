<?php 
  session_start();
  if (!isset($_SESSION['loggedIn'])) header("Location: index.php");

  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
  
  include('header.php');
  include('nav.php');
  include("../../Controller/appointmentListViewController.php"); 
?>

<div class="container-y">
  <div class="w-80 mx-auto py-2">
    <div class="bg-p-2 d-flex center">
        <h4 class="card-title text-white my-1 font-2">Appointment List</h4>
    </div>
    <div>
        <table class="table font-1" style="width:100%">
            <thead>
                <tr class="text-center" >
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Car License</th>
                    <th>Mechanic</th>
                    <th>Appointment Date</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <?php while($rows = mysqli_fetch_assoc($result)) { ?>
                <tr class="text-center">
                    <td style="vertical-align: middle;"><?php echo $rows['name'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['phone'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['car_license'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['mechanic'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['appointment_date'] ?></td>
                    <td style="vertical-align: middle;">
                        <form action="editAppointment.php" method="post">
                            <input name="id" class="d-none" type="text" value="<?php echo $rows['id'] ?>" >
                            <input name="name" class="d-none" type="text" value="<?php echo $rows['name'] ?>" >
                            <input name="address" class="d-none" type="text" value="<?php echo $rows['address'] ?>" >
                            <input name="phone" class="d-none" type="text" value=<?php echo $rows['phone'] ?> >
                            <input name="car_license" class="d-none" type="text" value="<?php echo $rows['car_license'] ?>" >
                            <input name="car_engine" class="d-none" type="text" value=<?php echo $rows['car_engine'] ?> >
                            <input name="mechanic" class="d-none" type="text" value="<?php echo $rows['mechanic'] ?>" >
                            <input name="appointment_date" class="d-none" type="text" value="<?php echo $rows['appointment_date'] ?>" >
                            <button class="btn btn-secondary cursor-pointer w-100 mt-1 text-white">Edit</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
  </div>
</div>


<?php include('../footer.php') ?>
<script>navHighlight('appointment-list')</script>