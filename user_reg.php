<?php
    if (!isset($_SESSION['u_id'])){
        header("Location: index.php");
    }
    ?>
    
<div align="left" >
    <form class="form-signin register-form" action="includes/reg.inc.php" method="POST">

                <input type="text" name="logname" class="form-control" placeholder="Prisijungimo vardas" required autofocus>
                <input type="text" name="fname" class="form-control" placeholder="Vardas" required autofocus>
                <input type="text" name="lname" class="form-control" placeholder="Pavardė" required autofocus>
                <input type="text" name="umail" class="form-control" placeholder="el. paštas" required autofocus>
                <input type="password" name="pwd" class="form-control" placeholder="Slaptažodis" required>
        
                <button class="btn btn-lg btn-block btn-custom" type="submit" name="submit" >REGISTRUOTI</button>

    </form>
</div>