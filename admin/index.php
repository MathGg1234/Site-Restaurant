<?php
session_start();

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == 'adminpassword') {
        $_SESSION['loggedin'] = true;
    } else {
        $error = "Mot de passe incorrect";
    }
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Réservations</title>
</head>
<body>
    <h2>Admin - Connexion</h2>
    <form method="post" action="">
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>

<?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Réservations</title>
</head>
<body>
    <h2>Réservations</h2>
    <?php
    include '../includes/db.php';

    $result = $conn->query("SELECT * FROM reservations");

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Convives</th>
                    <th>Message</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['time']}</td>
                    <td>{$row['guests']}</td>
                    <td>{$row['message']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Aucune réservation trouvée";
    }

    $conn->close();
    ?>
</body>
</html>
