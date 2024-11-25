<?php
// index.php

// Uključujemo kontroler za autentifikaciju
require_once __DIR__ . '/../controllers/AuthController.php';

// Ako parametar 'page' nije definiran, default će biti 'home'
$page = $_GET['page'] ?? 'home';
// '$_GET' dohvaća podatke iz URL-a. U ovom slučaju, parametar 'page' definira koju akciju trebamo izvršiti.
// Ako 'page' nije definiran, kao zadana (default) vrijednost koristimo 'home'.

// Kreiramo novi objekt kontrolera za autentifikaciju
$authController = new AuthController();
// 'AuthController' je klasa koja sadrži metode za rukovanje registracijom, prijavom, profilom i odjavom korisnika.

// Switch statement za pozivanje odgovarajućih metoda na temelju parametra 'page'
switch ($page) {
    case 'home':
        // Prikazuje početnu stranicu s opcijama za registraciju ili prijavu
        require __DIR__ . '/../views/home.php';

        break;

    case 'register':
        // Prikazuje registracijsku formu
        $authController->showRegisterForm();
        break;

    case 'registerUser':
        // Obrada registracije korisnika
        $authController->registerUser();
        break;

    case 'login':
        // Prikazuje login formu
        $authController->showLoginForm();
        break;

    case 'loginUser':
        // Obrada prijave korisnika
        $authController->loginUser();
        break;

    case 'profile':
        // Prikazuje profil korisnika
        $authController->showProfile();
        break;

    case 'logout':
        // Odjava korisnika
        $authController->logout();
        break;

    default:
        // Ako je nepoznat parametar 'page', prikazuje početnu stranicu kao default
        require __DIR__ . '/../views/home.php';

        break;
}
