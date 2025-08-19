<?php include 'db.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO bookings (hotel_id, name, email, checkin, checkout) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['hotel_id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['checkin'],
        $_POST['checkout']
    ]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>🎉 Booking Confirmed 🎉</h1>
    <p>Thank you for booking! A confirmation email has been sent.</p>
</body>
</html>
 
