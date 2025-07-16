<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
session_start();
session_reset();
session_destroy();
header("Location: /LoginSystem/Consultant/c_login.html");
}
exit;
?>