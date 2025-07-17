<?php
session_start();
    require_once '../config/db.php';
    //check my user is logged in
    if(!isset($_SESSION['c_id'])){
        header("Location: /LoginSystem/Consultant/c_login.html");
        exit;
    };
    $c_id = $_SESSION['c_id'];
    $c_username = $_SESSION['c_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="top">
    <h1 class="head">Home </h1>
    <nav>
        <div> <a href="c_index.html">Home</a></div>
        <div> <a href="about.html">About</a></div>
        <div> <a href="c_profile.php">Profile</a></div>
        <div> <a href="ts.html">Tech Stacks</a></div>
    </nav>
    </div>
    <br>
    <br>
    <h1>Welcome <?php echo $c_username?></h1>

    <style>
        .top{
            padding: 20px;
            margin: 0px;
            background-color: #272727;
            color: #D4AA7D;
        }
        h1 {
            text-align: center;
            font-size: 50px;
        }
        nav {
            display: flex;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            justify-content: space-evenly;
            
        }
        nav div{
            margin: 0%;
            margin-top: 10px;
            
        }
    .head{
        font-family: 'Courier New', Courier, monospace;
        font-size: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
form {
        background: #fff;
        max-width: 420px;
        margin: 40px auto 0 auto;
        padding: 32px 32px 24px 32px;
        border-radius: 18px;
        box-shadow: 0 6px 32px rgba(44, 62, 80, 0.10);
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    label {
        font-size: 1.1rem;
        color: #22223b;
        margin-bottom: 6px;
        font-weight: 500;
    }
    input[type="text"], select, textarea {
        font-size: 1rem;
        padding: 10px 12px;
        border: 1.5px solid #c9ada7;
        border-radius: 7px;
        background: #f8f9fa;
        color: #22223b;
        outline: none;
        transition: border 0.2s;
        width: 100%;
        box-sizing: border-box;
    }
    input[type="text"]:focus, select:focus, textarea:focus {
        border-color: #4a4e69;
        background: #fff;
    }
    textarea {
        min-height: 80px;
        resize: vertical;
    }
    .Submit {
        background: linear-gradient(90deg, #4a4e69 60%, #9a8c98 100%);
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 12px 0;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(44, 62, 80, 0.07);
    }
    .Submit:hover {
        background: linear-gradient(90deg, #22223b 60%, #4a4e69 100%);
        box-shadow: 0 4px 16px rgba(44, 62, 80, 0.13);
    }
    @media (max-width: 600px) {
        form {
            padding: 18px 8px 14px 8px;
            max-width: 98vw;
        }
        .head {
            font-size: 2rem;
        }
        nav {
            gap: 18px;
        }
    }
</style>
</body>
</html>