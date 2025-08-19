<?php include 'db.php';
session_start();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
    $check = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);
 
    if ($check->rowCount() > 0) {
        $error = "Email already exists!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $pass]);
        $_SESSION['user'] = ['name' => $name, 'email' => $email];
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>🎀 Signup for DreamStay 🎀</h1>
<form method="post">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Signup</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
<p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
 
