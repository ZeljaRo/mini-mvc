<!-- views/profile.php -->
<!-- HTML kôd za prikaz profila korisnika -->
<h2>Profil korisnika</h2>

<!-- Prikaz dobrodošlice korisniku -->
<p>Dobrodošao, <?php echo htmlspecialchars($user['name']); ?>!</p>
<!-- 'htmlspecialchars()' se koristi kako bi se izbjegli sigurnosni problemi poput XSS (Cross-Site Scripting).
     Ovdje se prikazuje ime korisnika koje je spremljeno u varijabli $user, a dolazi iz sesije. -->

<!-- Forma za odjavu korisnika -->
<form method="POST" action="index.php?page=logout">
    <!-- Gumb za odjavu korisnika -->
    <button type="submit">Odjava</button>
    <!-- 'type="submit"' označava da će gumb poslati formu kada se klikne, što pokreće logout akciju. -->
</form>