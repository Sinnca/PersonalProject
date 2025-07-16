<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
session_start();
session_reset();
session_destroy();
header("Location: /LoginSystem/User/u_login.html");
exit;
}
?>