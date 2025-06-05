<?php
session_start();
require 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: index.php");
    } else {
        echo "Password salah!";
    }
} else {
    echo "Email tidak terdaftar!";
}
if(password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'name' => $user['name']
    ];
    
    // Redirect dengan parameter untuk clear cache
    header("Location: index.php?r=".rand());
    exit;
}
?>