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

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }
        nav {
            background: #2d3e50;
            padding: 1em 0.5em;
            display: flex;
            gap: 1em;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 4px;
            transition: background 0.2s;
        }
        nav a:hover {
            background: #4a6fa5;
        }
        .container {
            max-width: 500px;
            margin: 2em auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
            padding: 2em;
        }
        h1 {
            color: #2d3e50;
            text-align: center;
            margin-bottom: 1em;
        }
        label {
            display: block;
            margin-bottom: 0.5em;
            color: #4a6fa5;
            font-weight: 500;
        }
        input[type="text"] {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #bfc9d4;
            border-radius: 4px;
            font-size: 1em;
        }
        input[type="submit"] {
            background: #4a6fa5;
            color: #fff;
            border: none;
            padding: 0.7em 1.5em;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            margin-right: 0.5em;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #2d3e50;
        }
        .profile-info {
            background: #f4f8fb;
            border-radius: 6px;
            padding: 1em;
            margin-top: 1.5em;
            color: #2d3e50;
            font-size: 1.05em;
        }
        .actions {
            margin-top: 1em;
            display: flex;
            gap: 0.5em;
        }
    </style>
    <nav>
        <div><a href="c_index.html">Home</a></div>
        <div><a href="c_profile.php">Profile</a></div>
    </nav>
    <div class="container">
        <h1>Consultant Profile</h1>
        <form action="update_profile.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="new_username" value="<?= htmlspecialchars($c_username) ?>">
            <label for="expertise">Expertise</label>
            <input type="text" id="expertise" name="new_expertise" value="<?= htmlspecialchars($c_expertise) ?>">
            <div class="actions">
                <input type="submit" value="Update">
            </div>
        </form>
        <div class="actions">
            <form action="c_logout.php" method="post">
                <input type="submit" value="Logout">
            </form>
            <form action="c_delete.php" method="post" onsubmit="return confirm('Are you sure to delete your account?')">
                <input type="submit" value="Delete Account" style="background:#e74c3c;">
            </form>
        </div>
        <div class="profile-info">
            <?php
            $c_id = $_SESSION['c_id'];
            $c_username = $_SESSION['c_username'];
            $c_expertise = $_SESSION['c_expertise'];
            $c_email = $_SESSION['c_email'];

            echo "<strong>Username:</strong> " . htmlspecialchars($c_username) . "<br>";
            echo "<strong>Expertise:</strong> " . htmlspecialchars($c_expertise) . "<br>";
            echo "<strong>Email:</strong> " . htmlspecialchars($c_email) . "<br>";
            ?>
        </div>
    </div>


</body>
</html>