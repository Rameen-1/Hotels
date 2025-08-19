<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>DreamStay – Book Hotels</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header><h1>🌸 DreamStay 🌸</h1></header>
    <div class="search-bar">
        <form action="hotels.php" method="get">
            <input type="text" name="location" placeholder="Enter destination" required>
            <input type="date" name="checkin" required>
            <input type="date" name="checkout" required>
            <button type="submit">Search</button>
        </form>
    </div>
 
    <h2>✨ Featured Hotels ✨</h2>
    <div class="hotel-grid">
        <?php
        $stmt = $pdo->query("SELECT * FROM hotels ORDER BY rating DESC LIMIT 3");
        while ($row = $stmt->fetch()) {
            echo "<div class='hotel-card'>
                    <img src='images/{$row['image']}' alt=''>
                    <h3>{$row['name']}</h3>
                    <p>{$row['location']} | ⭐ {$row['rating']}</p>
                    <p>From \${$row['price']}/night</p>
                  </div>";
        }
        ?>
    </div>
</body>
</html>
 
