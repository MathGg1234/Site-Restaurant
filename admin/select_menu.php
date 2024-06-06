<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_menu'])) {
    $selected_menu_id = $_POST['selected_menu'];

    // Désélectionner tous les menus
    $stmt = $conn->prepare("UPDATE daily_menu SET selected = 0");
    if (!$stmt->execute()) {
        echo "Erreur lors de la désélection des menus : " . $stmt->error;
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // Sélectionner le menu choisi
    $stmt = $conn->prepare("UPDATE daily_menu SET selected = 1 WHERE id_menu = ?");
    $stmt->bind_param('i', $selected_menu_id);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Erreur lors de la sélection du menu : " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Données de formulaire invalides";
}

$conn->close();
?>

