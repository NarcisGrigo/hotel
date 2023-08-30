<?php
function dbConnexion() {
    $connexion = null;
    try {
        $connexion = new PDO("mysql:host=localhost;dbname=hotel_db", "root", "");
    }catch(PDOException $e) {
        $connexion = $e->getMessage();
    }
    return $connexion;
}