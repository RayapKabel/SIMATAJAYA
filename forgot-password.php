<?php
require 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Cek apakah email terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        // Generate token reset (contoh sederhana)
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));
        
        // Simpan token ke database
        $update = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $update->bind_param("sss", $token, $expires, $email);
        $update->execute();
        
        // Kirim email (contoh simulasi)
        $reset_link = "http://yourdomain.com/reset-password.php?token=$token";
        echo "Link reset password telah dikirim ke email Anda: <br>$reset_link";
    } else {
        echo "Email tidak terdaftar!";
    }
}
?>