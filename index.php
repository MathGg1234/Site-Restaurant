<?php 
include 'includes/header.php'; 
include 'includes/db.php';

// Récupérer les menus du jour
$menu_du_jour = $conn->query("SELECT * FROM daily_menu");

// Récupérer le menu sélectionné
$menu_selectionne = $conn->query("SELECT * FROM daily_menu WHERE selected = 1");
?>

<main>
<div class="wrapper">
    <!-- Carousel d'images -->
    <section id="carousel" class="carousel-container">
        <div class="carousel">
            <img src="assets/images/plat1.jpg" alt="Plat 1">
            <img src="assets/images/plat2.jpg" alt="Plat 2">
            <img src="assets/images/restaurant.jpg" alt="Intérieur du restaurant">
        </div>
    </section>

    <section id="about" class="section">
        <h2>À propos de nous</h2>
        <p>Bienvenue dans notre restaurant, où nous offrons une cuisine délicieuse et un service exceptionnel.</p>
    </section>
    
    <!-- Témoignages clients -->
    <section id="testimonials" class="section testimonials-section">
        <h2>Témoignages</h2>
        <div class="testimonial">
            <p>"Un des meilleurs restaurants de Paris!" - Marie</p>
        </div>
        <div class="testimonial">
            <p>"Cuisine exceptionnelle et ambiance chaleureuse." - Pierre</p>
        </div>
    </section>
    
    <section id="hours-location" class="section">
        <h2>Horaires et localisation</h2>
        <p>Ouvert tous les jours de 12h à 22h</p>
        <p>Adresse : 123 Rue de la Cuisine, Paris, France</p>
        
        <!-- Intégration de Google Maps -->
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21292.707778992703!2d-1.6883281499999998!3d48.15673855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edde419aaba19%3A0x1b663446de01a979!2sCarrefour%20City!5e0!3m2!1sfr!2sfr!4v1717595816072!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    
    <!-- Menu du jour -->
    <section id="daily-menu" class="section">
        <h2>Menu du jour</h2>
        <?php
        if ($menu_selectionne->num_rows > 0) {
            while($row = $menu_selectionne->fetch_assoc()) {
                echo "<p><strong>" . $row['dish_name'] . "</strong> <br> <br>" . $row['description'] . "</p>";
            }
        } else {
            echo "<p>Pas de menu du jour sélectionné.</p>";
        }
        ?>
    </section>
    
    <section id="contact" class="section">
        <h2>Contactez-nous</h2>
        <p>Email : contact@restaurant.com</p>
        <p>Téléphone : 01 23 45 67 89</p>
        
        <!-- Icônes des réseaux sociaux -->
        <div id="social-media" class="social-media">
            <a href="https://www.facebook.com/restaurant" target="_blank">Facebook</a>
            <a href="https://www.twitter.com/restaurant" target="_blank">Twitter</a>
            <a href="https://www.instagram.com/restaurant" target="_blank">Instagram</a>
        </div>
    </section>
    </div>
</main>

<script>

window.addEventListener("scroll", function() {
    var footer = document.querySelector("footer");
    var scrollTop = window.scrollY;
    var windowHeight = window.innerHeight;
    var documentHeight = document.body.clientHeight;
    if (scrollTop + windowHeight >= documentHeight) {
        footer.style.display = "block"; // Afficher le footer lorsque l'utilisateur a défilé jusqu'en bas
    } else {
        footer.style.display = "none"; // Cacher le footer sinon
    }
});
</script>

<?php include 'includes/footer.php'; ?>

<?php
$conn->close();
?>

