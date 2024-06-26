<?php include '../includes/header.php'; ?>
    <main>
        <h2>Réservez une table</h2>
        <form action="process_reservation.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
            
            <label for="time">Heure :</label>
            <input type="time" id="time" name="time" required>
            
            <label for="guests">Nombre de convives :</label>
            <input type="number" id="guests" name="guests" required>
            
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
            
            <button type="submit">Réserver</button>
        </form>
    </main>
<br>
<br>
<br>
<br>
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
<?php include '../includes/footer.php'; ?>
