<?php
// models/User.php

// Definicija klase User koja predstavlja model korisnika
class User
{
    // Privatna varijabla za bazu podataka
    private $db;

    // Konstruktor klase - prima instancu baze podataka
    public function __construct($database)
    {
        // Spremanje reference na bazu podataka u privatnu varijablu
        $this->db = $database;
    }

    // Metoda za kreiranje novog korisnika u bazi podataka
    public function create($name, $email, $password)
    {
        // Hashiranje lozinke koristeći BCRYPT algoritam radi sigurnosti
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // SQL upit za umetanje novog korisnika u bazu podataka
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        // Priprema SQL upita - ovo pomaže u sprječavanju SQL injekcija
        $stmt = $this->db->prepare($query);

        // Izvršavanje upita s predanim parametrima (ime, email, hashirana lozinka)
        return $stmt->execute([$name, $email, $hashedPassword]);
    }

    // Metoda za pronalaženje korisnika prema emailu
    public function findByEmail($email)
    {
        // SQL upit za pronalaženje korisnika prema emailu
        $query = "SELECT * FROM users WHERE email = ?";

        // Priprema SQL upita
        $stmt = $this->db->prepare($query);

        // Izvršavanje upita s predanim parametrom (email)
        $stmt->execute([$email]);

        // Vraća prvi redak kao asocijativno polje (podaci korisnika)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
