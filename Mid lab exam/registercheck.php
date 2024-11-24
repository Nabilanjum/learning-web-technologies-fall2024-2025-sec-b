<?php
session_start();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);
 
    if (empty($username) || empty($password) || empty($confirmpassword)) {
        echo "All fields are required!";
        exit();
    }
 
    if (strlen($username) < 4) {
        echo "Username must be at least 4 characters long!";
        exit();
    }
 
    if ($password !== $confirmpassword) {
        echo "Passwords do not match!";
        exit();
    }
 
    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long!";
        exit();
    }
 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $_SESSION['registered_user'] = [
        'username' => $username,
        'password' => $hashedPassword, 
    ];

    echo "Registration successful!";
    header('location: login.html');
    exit();
} else {
    header('location: register.html');
    exit();
}
?>