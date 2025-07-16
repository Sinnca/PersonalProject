<?php
    session_start();
    require_once '../config/db.php';
    //check my user is logged in
    if(!isset($_SESSION['c_id'])){
        header("Location: /LoginSystem/Consultant/c_login.html");
        exit;
    };
    $c_username = $_SESSION['c_username'];
    $c_expertise = $_SESSION['c_expertise'];
    $c_id = $_SESSION['c_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- check  if the form is updated -->
    <?php if (isset($_GET['updated']) && $_GET['updated'] === 'true'): ?>
    <p style="color: green;">Updated Successfully!</p>
    <?php endif; ?>

    <h1>Consultant Page</h1>
    <nav>
        <div> <a href="c_index.html">Home</a></div>
        <div> <a href="c_profile.php">Profile</a></div>
    </nav>
    <p>Update Consultant's Username and Expertise</p>
        <form action="update_profile.php" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="new_username" value="<?= htmlspecialchars($c_username) ?>">
            <br>
            <label for="expertise">Expertise: </label>
            <input type="text" id="expertise" name="new_expertise" value="<?= htmlspecialchars($c_expertise) ?>">
            <br>
            <input type="submit" value="Update">
            <br>
        </form>
        <form action="c_logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
        <form action="c_delete.php" method="post" onsubmit="return confirm('Are you sure to delete your account?')">
            <input type="submit" value="Delete Account">
        </form>
    
    <?php
    $c_id = $_SESSION['c_id'];
    $c_username = $_SESSION['c_username'];
    $c_expertise = $_SESSION['c_expertise'];
    $c_email = $_SESSION['c_email'];

    echo "Username: " . htmlspecialchars($c_username) . "<br>";
    echo "Expertise: " . htmlspecialchars($c_expertise) . "<br>";
    echo "Email: " . htmlspecialchars($c_email) . "<br>";
    ?>


</body>
</html>