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
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Username"], $_POST["Expertise"], $_POST["Email"], $_POST["Password"])){
            $Username = $_POST["Username"];
            $Expertise = $_POST["Expertise"];
            $Email = $_POST["Email"];
            $Password = $_POST["Password"];
            $hash = password_hash($Password, PASSWORD_DEFAULT);
            //filtering email
            $sql = "SELECT * FROM consultants WHERE email = '$Email'";
            $data = mysqli_query($conn, $sql);
            //check if email is existing
            if ($data && mysqli_num_rows($data) === 1){
                echo "Email already taken";
            } else {
                $sql = "INSERT INTO consultants (username, expertise, email, password) VALUES ('$Username', '$Expertise', '$Email', '$hash' )";
                $info  = mysqli_query($conn, $sql);
                if ($info){
                header("Location: /LoginSystem/Consultant/c_login.html");
                exit;
            } else {
            echo "Register failed";
        }
            }
        }
        
    ?>

</body>
</html>