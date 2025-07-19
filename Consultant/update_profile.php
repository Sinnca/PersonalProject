<?php
    session_start();
    require_once '../config/db.php';
    //check my user is logged in
    if(!isset($_SESSION['c_id'])){
        header("Location: /LoginSystem/Consultant/c_login.html");
        exit;
    };
    $c_id = $_SESSION['c_id'];
?>
<?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_username'], $_POST['new_expertise'], $_POST['new_email'])){
            $new_username = $_POST['new_username'];
            $new_expertise =  $_POST['new_expertise'];
            $new_email = $_POST['new_email'];

            $update = "UPDATE consultants SET username = '$new_username', expertise = '$new_expertise', email = '$new_email' WHERE id = '$c_id'";
            $updated = mysqli_query($conn, $update);

            if ($updated && mysqli_affected_rows($conn) > 0){
                echo "Updated Successfully";
                $_SESSION['c_username'] = $new_username;
                $_SESSION['c_expertise'] = $new_expertise;
                $_SESSION['c_email'] = $new_email;
                $c_username = $_SESSION['c_username'];
                $c_expertise = $_SESSION['c_expertise'];
                $c_email = $_SESSION['c_email'];
                header("Location: c_profile.php?updated=true");
            } else {
                echo "Update Failed";
            }
        }
    ?>