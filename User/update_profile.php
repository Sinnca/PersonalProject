<?php
session_start();
require_once '../config/db.php';
if(!isset($_SESSION['c_id'])){
        header("Location: /LoginSystem/Consultant/c_login.html");
        exit;
    };

    $user_id = $_SESSION['user_id'];
    $user_username = $_SESSION['user_username'];
    $user_email = $_SESSION['user_email'];

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_username'],  $_POST['new_email'])){
        $new_username = $_POST['new_username'];
        $new_email = $_POST['new_email'];

        $sql = "SELECT * FROM users WHERE email = '$new_email'";
        $result = mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) === 1){
            echo "Email is taken please choose another Email address";
        } else {
            $update = "UPDATE users SET username = '$new_username', email = '$new_email' WHERE id = '$user_id'";
            $updated = mysqli_query($conn, $update);
        
        if ($updated &&  mysqli_affected_rows($conn) > 0) {
            echo "You have updated your Username and Email Successfully";
            $_SESSION['user_username'] = $new_username;
            $_SESSION['user_email'] =  $new_email;
            $user_username = $_SESSION['user_username'];
            $user_email = $_SESSION['user_email'];
            header("Location: u_profile.php?updated=true");
        } else {
            echo "Update failed!";
        }
        }

    }
?>