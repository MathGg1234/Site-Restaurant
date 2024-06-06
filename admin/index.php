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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    <link rel="stylesheet" href="/Site-Restaurant/assets/css/Astyles.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin - Connexion</h2>
        <form method="post" action="">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </div>
</body>
</html>

<?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Panel</title>
    <link rel="stylesheet" href="/Site-Restaurant/assets/css/Astyles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Panel Admin</h2>
        <div class="date-selector">
            <form id="date-form" method="get" action="">
            
            <h2>Réservation</h2>
            
                <label for="reservation-date">Voir les réservations pour le :</label>
                <input type="date" id="reservation-date" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); ?>">
            </form>
        </div>
        <?php
        include '../includes/db.php';

        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $stmt = $conn->prepare("SELECT * FROM reservations WHERE date = ? ORDER BY date");
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();

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

        $stmt->close();

        // Fetch daily menus
        $stmt = $conn->prepare("SELECT * FROM daily_menu ORDER BY date");
        $stmt->execute();
        $menus = $stmt->get_result();

        if ($menus->num_rows > 0) {
            echo "<h2>Menus du Jour</h2>";
            echo "<form id='select-menu-form' method='post' action='select_menu.php'>";
            echo "<table>
                    <tr>
                        <th>Nom du Plat</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Sélectionner</th>
                    </tr>";
            while($menu = $menus->fetch_assoc()) {
                echo "<tr>
                        <td>{$menu['dish_name']}</td>
                        <td>{$menu['description']}</td>
                        <td>{$menu['date']}</td>
                        <td><input type='radio' name='selected_menu' value='{$menu['id_menu']}'></td>
                      </tr>";
            }
            echo "</table>";
            echo "<button type='submit'>Sélectionner le Menu</button>";
            echo "</form>";
        } else {
            echo "Aucun menu du jour trouvé";
        }

        $stmt->close();
        ?>
        <button id="add-reservation-btn">Ajouter une réservation</button>
        <button id="add-daily-menu-btn">Ajouter un plat du jour</button>
    </div>

    <div id="reservation-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ajouter une réservation</h2>
            <form id="add-reservation-form">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phone">Téléphone:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Heure:</label>
                <input type="time" id="time" name="time" required>
                <label for="guests">Convives:</label>
                <input type="number" id="guests" name="guests" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
                <button type="submit">Valider</button>
            </form>
        </div>
    </div>

    <div id="daily-menu-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ajouter un plat du jour</h2>
            <form id="add-daily-menu-form">
                <label for="dish_name">Nom du plat:</label>
                <input type="text" id="dish_name" name="dish_name" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <label for="date">Date:</label>
                <input type="date" id="menu-date" name="date" required>
                <button type="submit">Valider</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#reservation-date').change(function() {
                $('#date-form').submit();
            });

            var modal = $('#reservation-modal');
            var menuModal = $('#daily-menu-modal');

            $('#add-reservation-btn').click(function() {
                modal.show();
            });

            $('#add-daily-menu-btn').click(function() {
                menuModal.show();
            });

            $('.close').click(function() {
                modal.hide();
                menuModal.hide();
            });

            $(window).click(function(event) {
                if ($(event.target).is(modal)) {
                    modal.hide();
                }
                if ($(event.target).is(menuModal)) {
                    menuModal.hide();
                }
            });

            $('#add-reservation-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_reservation.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Réservation ajoutée avec succès');
                        location.reload();
                    },
                    error: function() {
                        alert('Erreur lors de l\'ajout de la réservation');
                    }
                });
            });

            $('#add-daily-menu-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_daily_menu.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Erreur lors de l\'ajout du plat du jour : ' + xhr.responseText);
                    }
                });
            });

            $('#select-menu-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'select_menu.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Menu du jour sélectionné avec succès');
                        location.reload();
                    },
                    error: function() {
                        alert('Erreur lors de la sélection du menu du jour');
                    }
                });
            });
        });
    </script>
</body>
</html>

