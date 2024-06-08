<?php
include 'db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user'; // Default role is user

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="main-body">
<div class="register-container">
    <div class="register-info">
        <h2>Join PawPal Today!</h2>
        <p>Create an account to get started.</p>
    </div>
    <div class="register-form">
        <h2>Register</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <div class="login-link">
                <a href="login.php">Already have an account? Login</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
