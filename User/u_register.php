<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../config/db.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Email'], $_POST["Password"], $_POST["Username"]))
        $Username = $_POST["Username"];
        $Email =  $_POST["Email"];
        $Password = $_POST["Password"];
        $hash = password_hash($Password, PASSWORD_DEFAULT);
        
    $sql = " INSERT INTO users (username, email, password) VALUES ('$Username', '$Email' , '$hash')";
    $data = mysqli_query($conn, $sql);
    if ($data){
        echo "You have successfully registered. <a href='/LoginSystem/User/u_login.html'>Click here to login</a>";
    }   else {
        echo "Registration failed. Please try again. <a href=''/LoginSystem/User/u_register.html'>Click here to Register</a>";
    }
    ?> 
</body>
</html>