<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once '../config/contactdb.php';
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Name"], $_POST["Option"], $_POST["Message"])){
            $name = $_POST["Name"];
            $option = $_POST["Option"];
            $message = $_POST["Message"];
            $other = $_POST["Other"] ?? "";

            $sql = "INSERT INTO contact_messages (name, reason, other_reason, message) VALUES ('$name', '$option', '$other', '$message')";

            
            if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully!";
            } else {
            echo "Error inserting data: " . mysqli_error($conn);
            }

            if ($option == "Other") {
                echo "Name: " . htmlspecialchars($name) . "<br>";
                echo "Reason: " . htmlspecialchars($option) . "-" . htmlspecialchars($other) . "<br>";
                echo "Message: " . htmlspecialchars($message) . "<br>";
            } else {
                echo "Name: " . htmlspecialchars($name) . "<br>";
                echo "Reason: " . htmlspecialchars($option) . "<br>";
                echo "Message: " . htmlspecialchars($message) . "<br>";
            }
            header("Location: contact.html");
            
        }
    ?>
</body>
</html>