<?php 
include 'includes/header.php'; 
include 'includes/db.php';

$menu_du_jour = $conn->query("SELECT * FROM daily_menu");
?>

<main>
    <!-- Carousel d'images -->
    <section id="carousel">
        <div class="carousel">
            <img src="assets/images/plat1.jpg" alt="Plat 1">
            <img src="assets/images/plat2.jpg" alt="Plat 2">
            <img src="assets/images/restaurant.jpg" alt="Intérieur du restaurant">
        </div>
    </section>

    <section id="about">
        <h2>À propos de nous</h2>
        <p>Bienvenue dans notre restaurant, où nous offrons une cuisine délicieuse et un service exceptionnel.</p>
    </section>
    
    <!-- Témoignages clients -->
    <section id="testimonials">
        <h2>Témoignages</h2>
        <p>"Un des meilleurs restaurants de Paris!" - Marie</p>
        <p>"Cuisine exceptionnelle et ambiance chaleureuse." - Pierre</p>
    </section>
    
    <section id="hours-location">
        <h2>Horaires et localisation</h2>
        <p>Ouvert tous les jours de 12h à 22h</p>
        <p>Adresse : 123 Rue de la Cuisine, Paris, France</p>
        
        <!-- Intégration de Google Maps -->
        <div id="map">
            <!-- Assurez-vous d'ajouter votre clé API Google Maps -->
            
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21292.707778992703!2d-1.6883281499999998!3d48.15673855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edde419aaba19%3A0x1b663446de01a979!2sCarrefour%20City!5e0!3m2!1sfr!2sfr!4v1717595816072!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
        
        </div>
    </section>
    
    <section id="menu">
        <h2>Notre Carte</h2>
        <p><a href="menu.php">Découvrez notre menu</a></p>
    </section>

    <!-- Menu du jour -->
    <section id="daily-menu">
        <h2>Menu du jour</h2>
        <?php
        if ($menu_du_jour->num_rows > 0) {
            while($row = $menu_du_jour->fetch_assoc()) {
                echo "<p>" . $row['dish_name'] . " - " . $row['description'] . "</p>";
            }
        } else {
            echo "<p>Pas de menu du jour disponible.</p>";
        }
        ?>
    </section>
    
    <section id="contact">
    

    
    
        <h2>Contactez-nous</h2>
        
        

        
        
        <p>Email : contact@restaurant.com</p>
        <p>Téléphone : 01 23 45 67 89</p>
        
        
                    <!-- Icônes des réseaux sociaux -->
        <div id="social-media">
            <a href="https://www.facebook.com/restaurant" target="_blank">Facebook</a>
            <a href="https://www.twitter.com/restaurant" target="_blank">Twitter</a>
            <a href="https://www.instagram.com/restaurant" target="_blank">Instagram</a>
        </div>
        
        <br>
        <br>
    </section>
</main>
<?php include 'includes/footer.php'; ?>

<?php
$conn->close();
?>
