<?php include('header.php') ?>
    <div class="w-100 h-100 bg-s center">
      <div class="sign-in-form mx-auto">
        <h3 class="text-center text-white">Sign In</h3>
          <form class="mt-4 form-text" action="../../Controller/loginController.php"  method="POST" >
            <div class="form-group">
              <label for="email" class="text-white" >Email</label>
              <input type="email" name="email" class="form-control w-100" placeholder="email" >
            </div>
            <div class="form-group">
              <label for="password" class="text-white" >Password</label>
              <input type="password" name="password" class="form-control w-100" placeholder="password" >
            </div>
            <div class="sign-info text-center">
                <button type="submit" class="btn btn-inverse cursor-pointer mt-1 w-100 text-white">Sign In</button>
            </div>
          </form>
      </div>
    </div>
  </body>
</html>
