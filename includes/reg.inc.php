<?php

if(isset($_POST['submit'])){

    include_once 'db.inc.php';
    
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

    $name = mysqli_real_escape_string($conn, $_POST['logname']);
    $first = mysqli_real_escape_string($conn, $_POST['fname']);
    $last = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['umail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Error handler
    //
    if (empty($name) || empty($first) || empty($last) || empty($email) || empty($pwd)) {
        
        header("Location: ../index.php?signup=empty");
        exit();

    } else {
        
        if(!preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $first)){
            header("Location: ../index.php?signup=invalid");
            exit();
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../index.php?signup=emailerror");
                exit();
            } else {
                $sql = "SELECT * FROM vartotojai WHERE user_id='$name'";
                $result = mysqli_query($conn, $sql);
                $check = mysqli_num_rows($result);
                if ($check > 0) {
                    header("Location: ../index.php?signup=usertaken");
                    exit();
                } else {
                    // pass hashing
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert user in to database
                    $sql = "INSERT INTO vartotojai (user_fname, user_lname, user_email, user_logname, user_pwd)
                    VALUES ('$first', '$last', '$email', '$name', '$hashedPwd');";

                    mysqli_query($conn, $sql);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    

} else {
    header("Location: ../index.php");
    exit();
}