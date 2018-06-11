<?php

session_start();

if (isset($_POST['submit'])) {

    include 'db.inc.php';

    $uname  = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd  = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers

    if(empty($uname) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();


    } else {
        $sql = "SELECT * FROM vartotojai WHERE user_logname='$uname'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if($check <1){
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                
                $hashedPwd = password_verify($pwd, $row['user_pwd']);

                if($hashedPwd == false){
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif($hashedPwd == true) {
                    // Log in user 
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_fname'];
                    $_SESSION['u_last'] = $row['user_lname'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_logname'] = $row['user_logname'];
                    header("Location: ../index.php?login=success");
                    exit();

                }

            }
        }
    }

} else {

    header("Location: ../index.php?login=error");
    exit();
}