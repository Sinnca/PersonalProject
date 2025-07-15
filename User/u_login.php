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
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Email"], $_POST["Password"])){
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];

        $sql = "SELECT * FROM users WHERE email = '$Email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1){
            $user = mysqli_fetch_assoc($result);

            if (password_verify($Password, $user["password"])){
                header("Location: /LoginSystem/User/home.html");
                exit;
            }   else {
                echo "Login Failed, please try again. <br> <a href='/LoginSystem/User/u_login.html'>Click here to login again</a>";
            }
        }
    }
    ?>
</body>
</html>