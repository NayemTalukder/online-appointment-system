<?php 
  session_start();
  if (!isset($_SESSION['loggedIn'])) header("Location: index.php");
  
  include('header.php');
  include('nav.php');
?>


<?php include("../../Controller/mechanicListViewController.php"); ?>

<div class="container-y">
  <div class="w-50 mx-auto py-2">
    <div class="bg-p-2 d-flex center">
        <h4 class="card-title text-white my-1 font-2">Mechanic List</h4>
    </div>
    <div>
        <table class="table font-2" style="width:100%">
            <thead>
                <tr class="text-center" >
                    <th width="20%">ID</th>
                    <th width="40%">Name</th>
                    <th width="40%">Availability</th>
                </tr>
            </thead>
            <?php while($rows = mysqli_fetch_assoc($result)) { ?>
                <tr class="text-center">
                    <td style="vertical-align: middle;"><?php echo $rows['id'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['name'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $rows['availability'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
  </div>
</div>


<?php include('../footer.php') ?>
<script>navHighlight('mechanic-list')</script>