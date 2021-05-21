<?php
  session_start();

  $selected_mechanic = $model->getMechanic($_SESSION['mechanic_id']);
  