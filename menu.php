<?php
// menu.php
include 'includes/header.php'; 
include 'includes/db.php';


$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu du Restaurant</title>

</head>
<body>
    <div class="container">
        <h1>Notre Menu</h1>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='menu-item'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p>Prix: " . $row['price'] . " €</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun élément de menu trouvé.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
include 'includes/footer.php';
?>

