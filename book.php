<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$hotel_id = $_GET['id'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
 
$stmt = $pdo->prepare("SELECT * FROM hotels WHERE id = ?");
$stmt->execute([$hotel_id]);
$hotel = $stmt->fetch();
?>
<h1>Reserve at 🎀 <?php echo $hotel['name']; ?> 🎀</h1>
<form action="confirm.php" method="post">
    <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
    <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
    <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Confirm Booking</button>
</form>
</body>
</html>
 
