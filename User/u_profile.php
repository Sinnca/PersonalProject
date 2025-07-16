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
    if(!isset($_SESSION['user_id'])){
        header("Location: /LoginSystem/User/u_login.html");
        exit;
    };
    ?>
    <?php if (isset($_GET['updated']) && $_GET['updated'] === 'true'): ?>
    <p style="color: green;">Updated Successfully!</p>
    <?php endif; ?>

    <h1>Profile</h1>
        <form action="update_profile.php" method="post" id="form">
            <label for="username">Username: </label>
            <input type="text" id="new_username" name="new_username">
            <br>
            <label for="email">Email: </label>
            <input type="text" id="new_email" name="new_email">
            <br>
            <input type="submit" value="Update">
        </form>
        <form action="u_logout.php" method="post">
            <input type="submit" value="logout">
        </form>
<script>
    document.getElementById('form').addEventListener("submit", function(event){
        let Email = document.getElementById('new_email').value;
        if (!Email.includes("gmail.com")){
            alert ("Please Input a valid Email!!!");
            event.preventDefault();
        }});
</script>
<?php
    $user_id = $_SESSION['user_id'];
    $user_username = $_SESSION['user_username'];
    $user_email = $_SESSION['user_email'];

    echo "Your Id: " . htmlspecialchars($user_id) . "<br>";
    echo "Your Username: " . htmlspecialchars($user_username) . "<br>";
    echo "Your Email: " . htmlspecialchars($user_email) . "<br>";
?>
</body>
</html>