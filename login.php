<?php include 'db.php';
session_start();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];
 
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
 
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>🎀 Login to DreamStay 🎀</h1>
<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
<p>Don't have an account? <a href="signup.php">Signup here</a></p>
</body>
</html>
 
