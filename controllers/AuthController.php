<?php
// controllers/AuthController.php

// Uključujemo datoteku modela korisnika
require_once __DIR__ . '/../models/User.php';
// Uključujemo datoteku baze podataka
require_once __DIR__ . '/../database.php';

// Definicija kontrolera za autentifikaciju korisnika
class AuthController
{
    // Privatna varijabla za model korisnika
    private $user;

    // Konstruktor klase - kreira novi objekt korisnika koristeći instancu baze podataka
    public function __construct()
    {
        // Koristi globalnu varijablu $pdo za inicijalizaciju modela korisnika
        $this->user = new User($GLOBALS['pdo']);
    }

    // Obrada registracije korisnika
    public function registerUser()
    {
        // Provjera je li zahtjev HTTP POST metode
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dohvaćanje podataka iz POST zahtjeva
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Provjera postoji li korisnik s istim emailom
            if ($this->user->findByEmail($email)) {
                // Ako korisnik s istim emailom već postoji, ispisujemo poruku o grešci
                echo "Korisnik s ovim emailom već postoji. Molimo pokušajte ponovno s drugim emailom.";
            } else {
                // Ako korisnik ne postoji, pokušavamo kreirati novog korisnika
                if ($this->user->create($name, $email, $password)) {
                    // Registracija uspješna - preusmjeravanje na login stranicu
                    header('Location: index.php?page=login');
                    exit(); // Zaustavlja daljnje izvršavanje koda nakon preusmjeravanja
                } else {
                    // Ako registracija nije uspješna, ispisujemo poruku o grešci
                    echo "Registracija nije uspjela. Pokušajte ponovno.";
                }
            }
        }
    }

    // Prikazuje registracijsku formu korisniku
    public function showRegisterForm()
    {
        // Učitava pogled (view) za registracijsku formu
        require __DIR__ . '/../views/register.php';
    }

    // Prikazuje login formu korisniku
    public function showLoginForm()
    {
        // Učitava pogled (view) za login formu
        require __DIR__ . '/../views/login.php';
    }

    // Obrada podataka za prijavu korisnika
    public function loginUser()
    {
        // Provjera je li zahtjev HTTP POST metode
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dohvaćanje podataka iz POST zahtjeva
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Pronalazak korisnika prema emailu
            $user = $this->user->findByEmail($email);

            // Provjera postoji li korisnik i odgovara li lozinka
            if ($user && password_verify($password, $user['password'])) {
                // Započinje sesiju ako prijava uspije
                session_start();
                $_SESSION['user'] = $user; // Sprema korisnika u sesiju

                // Preusmjerava na profil korisnika
                header('Location: index.php?page=profile');
                exit();
            } else {
                // Ako prijava nije uspješna, ispisujemo poruku o grešci
                echo "Neispravni podaci za prijavu.";
            }
        }
    }

    // Prikazuje profil korisnika
    public function showProfile()
    {
        // Pokretanje sesije za pristup podacima sesije
        session_start();

        // Provjera je li korisnik prijavljen
        if (!isset($_SESSION['user'])) {
            // Ako korisnik nije prijavljen, preusmjerava ga na login stranicu
            header('Location: index.php?page=login');
            exit();
        }

        // Dohvaćanje podataka korisnika iz sesije
        $user = $_SESSION['user'];

        // Učitava pogled (view) za profil korisnika
        require __DIR__ . '/../views/profile.php';
    }

    // Odjavljuje korisnika
    public function logout()
    {
        // Pokretanje sesije za pristup podacima sesije
        session_start();

        // Uništava sesiju - odjavljuje korisnika
        session_destroy();

        // Preusmjerava na login stranicu
        header('Location: index.php?page=login');
        exit();
    }
}
