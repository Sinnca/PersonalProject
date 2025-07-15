<?php
    require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Update Consultant's Expertise</p>

    <form action="c_profile.php" method="post">
        <label for="Email">Email (to identify the consultant):</label>
        <input type="text" name="Email" required>
        <br>

        <label for="Expertise">New Expertise:</label>
        <input type="text" name="Expertise" required>
        <br>

        <input type="submit" value="Update">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Email'], $_POST['Expertise'])) {
        $Email = $_POST['Email'];
        $Expertise = $_POST['Expertise'];

        $update = "UPDATE consultants SET expertise = '$Expertise' WHERE email = '$Email'";
        $updated = mysqli_query($conn, $update);

        if ($updated && mysqli_affected_rows($conn) > 0) {
            echo "Expertise updated successfully.";
        } else {
            echo "Update failed. Make sure the email exists.";
        }
    }
    ?>
</body>
</html>