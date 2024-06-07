<?php
// admin_menu.php
include '../includes/db.php';


// Traitement des ajouts/modifications/suppressions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Code pour ajouter un élément de menu
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = "INSERT INTO menu_items (name, description, price) VALUES ('$name', '$description', '$price')";
        $conn->query($sql);
    } elseif (isset($_POST['edit'])) {
        // Code pour modifier un élément de menu
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = "UPDATE menu_items SET name='$name', description='$description', price='$price' WHERE id='$id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        // Code pour supprimer un élément de menu
        $id = $_POST['id'];
        $sql = "DELETE FROM menu_items WHERE id='$id'";
        $conn->query($sql);
    }
}

// Requête pour récupérer les items du menu depuis la base de données
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration du Menu</title>
    <link rel="stylesheet" href="/Site-Restaurant/assets/css/Astyles.css">
</head>
<body>
    <div class="container">
        <h1>Administration du Menu</h1>
        <form action="admin_menu.php" method="post">
            <input type="hidden" name="id" value="">
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" required>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" required>
            <label for="price">Prix:</label>
            <input type="number" name="price" id="price" required>
            <button type="submit" name="add">Ajouter</button>
        </form>
        <h2>Éléments du Menu</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<form action='admin_menu.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='name'>Nom:</label>";
                echo "<input type='text' name='name' value='" . $row['name'] . "' required>";
                echo "<label for='description'>Description:</label>";
                echo "<input type='text' name='description' value='" . $row['description'] . "' required>";
                echo "<label for='price'>Prix:</label>";
                echo "<input type='number' name='price' value='" . $row['price'] . "' required>";
                echo "<button type='submit' name='edit'>Modifier</button>";
                echo "<button type='submit' name='delete'>Supprimer</button>";
                echo "</form>";
            }
        } else {
            echo "<p>Aucun élément de menu trouvé.</p>";
        }
        ?>
    </div>
</body>
</html>

