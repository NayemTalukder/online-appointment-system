<?php include('header.php') ?>
<div class="h-100 center">
  <div class="w-50 mx-auto">
    <div class="bg-p d-flex center">
        <h4 class="card-title text-white my-1 font-2">Get Help</h4>
    </div>
    <form class="mt-1 form-text" action="../Controller/createGetHelpController.php" method="POST" >
      <!-- Name -->
      <div class="form-group">
        <div class="w-100 center bg-p text-white">
          <label for="name" >Name</label>
        </div>
        <input type="text" name="name" class="form-control" placeholder="name" >
      </div>
      <!-- Phone -->
      <div class="form-group">
        <div class="w-100 center bg-p text-white">
          <label for="phone" >Phone</label>
        </div>
          <input type="text" name="phone" class="form-control" placeholder="Phone" >
      </div>
      <!-- Problem -->
      <div class="form-group">
        <div class="w-100 center bg-p text-white">
          <label for="problem" >Problem</label>
        </div>
        <textarea name="problem" class="form-control" placeholder="Problem" ></textarea>
      </div>
      <!-- Submit -->
      <div class="sign-info text-center">
        <button type="submit" class="btn btn-primary w-100 mt-1 text-white">Get Help</button>
      </div>
    </form>
  </div>
</div>
<?php include('footer.php') ?>
<script>navHighlight('get-help')</script>