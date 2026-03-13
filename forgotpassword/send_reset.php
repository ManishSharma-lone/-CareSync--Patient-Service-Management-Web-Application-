<?php
require "../dbconnect.php";
require "forgot_mail.php";
$email = $_POST['email'];

$token = bin2hex(random_bytes(50));
$expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

$sql = "UPDATE users SET reset_token=?, token_expiry=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss",$token,$expiry,$email);
$stmt->execute();

$reset_link = "http://localhost:8888/CareSync/forgotpassword/reset_password.php?token=".$token;

// Send email using PHPMailer
sendResetEmail($email,$reset_link);

echo "Reset link sent to your email";
?>