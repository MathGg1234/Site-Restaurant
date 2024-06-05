<?php
include '../includes/db.php';

$dish_name = $_POST['dish_name'];
$description = $_POST['description'];
$date = $_POST['date'];

$stmt = $conn->prepare("INSERT INTO daily_menu (dish_name, description, date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $dish_name, $description, $date);

if ($stmt->execute()) {
    echo "Plat du jour ajouté avec succès";
} else {
    echo "Erreur lors de l'ajout du plat du jour";
}

$stmt->close();
$conn->close();
?>
