<?php 
  session_start();
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }

  include('header.php');
  include('home.php');
  include('footer.php');
?>
<script>navHighlight('home')</script>