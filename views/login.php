<!-- views/login.php -->
<!-- HTML kôd za login formu -->
<h2>Prijava</h2>

<!-- Forma za prijavu korisnika -->
<form method="POST" action="index.php?page=loginUser">
    <!-- Polje za unos email adrese korisnika -->
    <input type="email" name="email" placeholder="Email" required>
    <!-- 'name' atribut je ime polja koje se koristi za pristup vrijednosti unutar PHP-a.
         'type="email"' osigurava da korisnik unese važeću email adresu.
         'placeholder' daje korisniku vizualnu naznaku što se očekuje da unese.
         'required' znači da je ovo polje obavezno. -->

    <!-- Polje za unos lozinke korisnika -->
    <input type="password" name="password" placeholder="Lozinka" required>
    <!-- 'type="password"' osigurava da unos lozinke bude sakriven.
         'placeholder' daje korisniku naznaku da ovdje treba unijeti lozinku.
         'required' znači da ovo polje mora biti ispunjeno prije slanja forme. -->

    <!-- Gumb za podnošenje forme -->
    <button type="submit">Prijavi se</button>
    <!-- 'type="submit"' označava da će gumb poslati formu kada se klikne. -->
</form>