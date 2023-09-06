<?php
function dbConnexion() {
    $connexion = null;
    try {
        $connexion = new PDO("mysql:host=localhost;dbname=id21228675_db_hotel", "id21228675_root", "Kira123!");
    }catch(PDOException $e) {
        $connexion = $e->getMessage();
    }
    return $connexion;
}