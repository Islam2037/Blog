<?php
if (!empty($_SESSION['success'])) {
?>
    <div class="alert alert-success my-5 text-center"><?php echo $_SESSION['success'];
    unset($_SESSION['success']); ?>

    </div>
<?php

}
?>