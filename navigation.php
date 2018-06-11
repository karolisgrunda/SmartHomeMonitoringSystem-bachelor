<?php
if (!isset($_SESSION['u_id'])){
        header("Location: index.php");
    }
?>

<h1 class="h3 mb-3 font-weight-normal">NAVIGACIJA</h1>


<a href="?main=home" class="btn">VALDYMAS</a>
<br />
<a href="?main=temp" class="btn">TEMPERATŪRŲ ISTORIJA</a> 
<br />
<a href="?main=user_reg" class="btn">NAUDOTOJO SUKURIMAS</a> 



        
<form class="form-signin text-center" action="includes/logout.inc.php" method="POST">               
    <button class="btn btn-lg btn-block btn-custom" type="submit" name="submit" >ATSIJUNGTI</button>
 </form>
