<?php
  session_start();
  if(!empty($_SESSION['errors']))
  {
    foreach($_SESSION['errors'] as $error)
    { 
      ?>
      <div class="alert alert-danger text-center"><?php echo $error; unset($_SESSION['errors']); ?></div>



    <?php 
    }
  }
  ?>