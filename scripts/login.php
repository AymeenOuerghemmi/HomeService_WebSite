<?php
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['login'])) {
    $input = clean($_POST);
    $username = $input['mail'];
    $password = $input['password'];

    // Check if the login credentials exist in the providers table
    $provider = DB::query("SELECT * FROM providers WHERE mail = ? AND password = ?", [$username, $password])->fetch();
    if ($provider) {
        // Provider login successful
        session_start();
        $_SESSION['user'] = $provider;
        header('Location: ../index.php'); // Redirect to the provider dashboard
        exit();
    }

    // Check if the login credentials exist in the users table
    $user = DB::query("SELECT * FROM users WHERE mail = ? AND password = ?", [$username, $password])->fetch();
    if ($user) {
        // User login successful
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../booking.php'); // Redirect to the user dashboard
        exit();
    }

    // If login fails, redirect back to the login page with an error message
    header('Location: ../login.php?msg=failed');
    exit();
}
?>
