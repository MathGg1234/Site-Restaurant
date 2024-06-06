<?php
include '../includes/db.php';

// Vérification des données reçues
if (!isset($_POST['dish_name']) || !isset($_POST['description']) || !isset($_POST['date'])) {
    echo "Données manquantes";
    exit();
}

$dish_name = $_POST['dish_name'];
$description = $_POST['description'];
$date = $_POST['date'];

// Affichage des données reçues pour vérification
error_log("Dish Name: $dish_name, Description: $description, Date: $date");

// Suppression de la virgule superflue dans la requête SQL
$stmt = $conn->prepare("INSERT INTO daily_menu (dish_name, description, date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $dish_name, $description, $date);

// Vérification de l'exécution de la requête
if ($stmt->execute()) {
    echo "Plat du jour ajouté avec succès";
} else {
    echo "Erreur lors de l'ajout du plat du jour : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

