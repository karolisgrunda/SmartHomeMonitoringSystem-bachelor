<?php
    if (!isset($_SESSION['u_id'])){
        header("Location: index.php");
    }
    
    
    include_once('includes/pdo.inc.php');

    $temp = 'SELECT * FROM kambarys1_temp ORDER BY id DESC LIMIT 1';
    $s = $pdo->prepare($temp);
    $s->execute();
    $row = $s->fetch(PDO::FETCH_ASSOC);

    $door_status = 'SELECT * FROM durys1_busena ORDER BY id DESC LIMIT 1';
    $s = $pdo->prepare($door_status);
    $s->execute();
    $doors = $s->fetch(PDO::FETCH_ASSOC);
    $status = $doors['door_state'];

    $module_status = 'SELECT * FROM moduliai ORDER BY id DESC LIMIT 1';
    $s = $pdo->prepare($module_status);
    $s->execute();
    $module = $s->fetch(PDO::FETCH_ASSOC);


?>
<div class="container col-md-12 container-home">
    
    <?php
    echo '<div align="right" ><h3>'.date('H:i') . ' ' . date('Y-m-d'). '</h3></div>';
    ?>

    <?php
        /*
        echo '<h3>'. $row['temp'] . ' &deg;C /* Laikas: '. $row['logtime'].' </h3> <br />';
        */
        echo '<h3>'. $row['temp'] . ' &deg;C </h3> <br />';

        if ($status == "opened"){
            echo "<h3>Atidarytos</h3>";
        }elseif ($status == "closed" ){
            echo "<h3>Uždarytos</h3>";
        }else{
            echo '<h3>Kažkas blogai </h3>' . var_dump($status) ;
            echo strcmp($status, $atd) . strcmp($status, $atd);
        }
        echo '<h3><p>Paskutinis sujudėjimas: ' .'<p>'. $doors['logtime'] .'<p>' . $doors['logdate'].'</h3>';

    ?>
    <br /><br />
    <h3>PIRMAS MODULIS</h3>

    <script>
        function writer() { 
            $.get("module_state_writer.php"); 
            return false; 
        } 

    </script>

    <?php

        if ($module['status'] == 0){

            echo '
            <label class="switch">
            <input type="checkbox" onclick="writer()">
            <span class="slider"></span>
            </label>
            ';

        } else if($module['status'] == 1) {

            echo '
            <label class="switch">
            <input type="checkbox" onclick="writer()" checked>
            <span class="slider"></span>
            </label>
            ';
        }
        
    ?>

    <br>


</div>