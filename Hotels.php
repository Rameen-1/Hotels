<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Hotels</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>🎀 Available Hotels 🎀</h1>
    <?php
    $location = $_GET['location'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $stmt = $pdo->prepare("SELECT * FROM hotels WHERE location LIKE ?");
    $stmt->execute(["%$location%"]);
    while ($row = $stmt->fetch()) {
        echo "<div class='hotel-card'>
                <img src='images/{$row['image']}' alt=''>
                <h3>{$row['name']}</h3>
                <p>{$row['location']} | ⭐ {$row['rating']}</p>
                <p>\${$row['price']}/night</p>
                <a href='book.php?id={$row['id']}&checkin=$checkin&checkout=$checkout'>Book Now</a>
              </div>";
    }
    ?>
</body>
</html>
 
