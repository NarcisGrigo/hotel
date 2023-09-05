<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/hotel/inc/database.php";
if (isset($_POST['book'])) {
    // récupérer les infos
    $idRoom = htmlspecialchars($_POST['id_room']);
    $startDate = htmlspecialchars($_POST['start_date']);
    $endDate = htmlspecialchars($_POST['end_date']);
    $price = htmlspecialchars($_POST['price']);

    // convertir en date
    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);

    $duration = $endDate - $startDate;

    $nbDays = $duration / 86400;

    echo "le nombre de jours est : $nbDays";


    // se connecter à la base de données
    $db = dbConnexion();

    // preparer la requette pour vérifier si la chambre est disponible entre la date de départ et la date de fin
    $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND booking_start_date < ? AND booking_end_date > ?");

    // éxécuter la requette
    try {
        $request->execute(array($idRoom, $startDate, $endDate));

        // récupérer le résultat
        $books = $request->fetch();
        if (empty($books)) {
            if ($startDate < $endDate) {
                // préparer la requette pour résérver la chambre
                $request = $db->prepare("INSERT INTO `bookings` (`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}