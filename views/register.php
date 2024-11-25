<!-- views/register.php -->
<!-- HTML kôd za registracijsku formu -->
<h2>Registracija</h2>

<!-- Forma za registraciju korisnika -->
<form method="POST" action="index.php?page=registerUser">
    <!-- Polje za unos imena korisnika -->
    <input type="text" name="name" placeholder="Ime" required>
    <!-- 'name' atribut je ime polja, koristi se za pristup vrijednosti unutar PHP-a.
         'placeholder' je tekst unutar polja prije nego što korisnik nešto unese.
         'required' znači da je ovo polje obavezno za ispuniti prije slanja forme. -->

    <!-- Polje za unos email adrese korisnika -->
    <input type="email" name="email" placeholder="Email" required>
    <!-- 'type="email"' postavlja validaciju kako bi se osiguralo da korisnik unosi važeći email. -->

    <!-- Polje za unos lozinke korisnika -->
    <input type="password" name="password" placeholder="Lozinka" required>
    <!-- 'type="password"' osigurava da se unos lozinke prikazuje kao skrivene (zvjezdice ili točkice). -->

    <!-- Gumb za podnošenje forme -->
    <button type="submit">Registriraj se</button>
    <!-- 'type="submit"' označava da će gumb poslati formu kada se klikne. -->
</form>