<?php
// Definiramo osnovne podatke za povezivanje s bazom podataka
$host = '127.0.0.1'; // IP adresa lokalnog servera (localhost). Ovo znači da se povezujemo s bazom podataka koja se nalazi na našem računalu.
$db = 'mini_mvc';    // Naziv baze podataka koju želimo koristiti. U ovom slučaju baza se zove 'mini_mvc'.
$user = 'root';      // Korisničko ime baze podataka. Kod XAMPP-a defaultno korisničko ime je 'root'.
$pass = '';          // Lozinka za bazu podataka. Kod XAMPP-a defaultno nema lozinke, ostavljamo prazno.

// Pokušaj povezivanja s bazom podataka koristeći PDO (PHP Data Objects)
try {
    // Kreiramo novi PDO objekt koji koristimo za povezivanje s MySQL bazom podataka.
    // PDO je PHP-ov način za rad s bazama podataka koji omogućava sigurniju i fleksibilniju interakciju.
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    // Postavljamo način rada s greškama na ERRMODE_EXCEPTION.
    // To znači da će PDO generirati iznimku svaki put kada dođe do greške, što nam omogućuje da lakše otkrijemo i ispravimo grešku.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Ako dođe do greške prilikom povezivanja s bazom podataka, blok 'catch' uhvatit će PDOException.
    // 'die' zaustavlja daljnje izvršavanje koda i ispisuje poruku o grešci.
    die("Povezivanje s bazom podataka nije uspjelo: " . $e->getMessage());
}
try {
    $stmt = $pdo->query("SHOW TABLES");
    echo "Konekcija je uspješna. Dostupne tablice su:<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['Tables_in_mini_mvc'] . "<br>";
    }
} catch (PDOException $e) {
    die("Greška s bazom podataka: " . $e->getMessage());
}
