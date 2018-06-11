<?php
    session_start();
    if (!isset($_SESSION['u_id'])){
      header("Location: index.php");
    }
?>

<div class="container container-main">
    <div class="col-md-4 mine-block nav-block">
        <?php
            include_once('navigation.php');
        ?>
    </div>

    <div class="col-md-8 mine-block">

        <?php
            $success = $_GET['login'];

            if ($success == "success"){
                $main = 'home';
            }else {
                $main = $_GET['main'];
            }
                include_once($main . '.php');

        ?>

    </div>
</div>

