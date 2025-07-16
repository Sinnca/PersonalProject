<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    require_once '../config/db.php';
    
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Email"], $_POST["Password"])){
            $Email = $_POST["Email"];
            $Password = $_POST["Password"];

            $sql = "SELECT * FROM consultants WHERE email = '$Email'";
            $data = mysqli_query($conn, $sql);

            if ($data && mysqli_num_rows($data) === 1){
                $c_user = mysqli_fetch_assoc($data);
            
            if (password_verify($Password, $c_user["password"])){
                $_SESSION['c_id'] = $c_user['id'];
                $_SESSION['c_username'] = $c_user['username'];
                $_SESSION['c_expertise'] = $c_user['expertise'];
                $_SESSION['c_email'] = $c_user['email'];
                header("Location: /LoginSystem/Consultant/c_index.html");
                exit;
            } else {
                echo "Incorrect password, please try again. <br> <a href='/LoginSystem/Consultant/c_login.html'>Click here to login again</a>";
            } 
        } else {
                echo "No Email have found";
            }
        }
    ?>
</body>
</html>