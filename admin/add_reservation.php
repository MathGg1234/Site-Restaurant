<?php
include '../includes/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, date, time, guests, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssis", $name, $email, $phone, $date, $time, $guests, $message);

if ($stmt->execute()) {
    echo "Réservation ajoutée avec succès";
} else {
    echo "Erreur lors de l'ajout de la réservation";
}

$stmt->close();
$conn->close();
?>
