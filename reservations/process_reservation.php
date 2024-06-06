<?php
include '../includes/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];
$message = $_POST['message'];

$sql = "INSERT INTO reservations (name, email, phone, date, time, guests, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssis", $name, $email, $phone, $date, $time, $guests, $message);

if ($stmt->execute()) {
    	header("Location: ../index.php");
	exit;
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
