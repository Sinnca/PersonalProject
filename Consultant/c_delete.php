<?php
session_start();
require_once '../config/db.php';
//check my user is logged in
    if(!isset($_SESSION['c_id'])){
        header("Location: /LoginSystem/Consultant/c_login.html");
        exit;
    };
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $c_id =  $_SESSION['c_id'];

        $delete = "DELETE FROM consultants WHERE id  = '$c_id'";
        $deleted = mysqli_query($conn, $delete);

        if ($deleted && mysqli_affected_rows($conn) > 0){
            session_destroy();
            echo "Account deleted successfully. <a href='/LoginSystem/Consultant/c_login.html'>Go to Login</a>";
            exit;
        } else {
            echo "Account Deletion Failed";
        }
    }
?>