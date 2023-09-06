<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/database.php";
if (isset($_POST['book'])) {
    // récupérer les infos
    $idRoom = htmlspecialchars($_POST['id_room']);
    $startDate = htmlspecialchars($_POST['start_date']);
    $endDate = htmlspecialchars($_POST['end_date']);
    $price = htmlspecialchars($_POST['price']);

    // convertir en date
    $dateStart = strtotime($startDate);
    $dateEnd = strtotime($endDate);

    $duration = $dateEnd - $dateStart;

    $nbDays = $duration / 86400;

    $today = date("j-m-y"); // la date d'aujourd'hui

    // si "$today" est > a la date de debut de résérvation ou bien "$today" est > a la date de fin de résérvation
    if (strtotime($today) > strtotime($startDate) || strtotime($today) > strtotime($endDate)) {
        echo "<script>alert(votre date de début ou de fin de résérvation ne peut pas etre < a la date d'aujourd'hui)</script>";
        echo '<script>window.location.href = "booking.php?room=' . $idRoom . '&price=' . $price . '";</script>';
    } else {
        $db = dbConnexion();
        $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND ((booking_start_date <= ? AND booking_end_date >= ?) OR (booking_start_date <= ? AND booking_end_date >= ?))");
        try {
            $request->execute(array($idRoom, $startDate, $startDate, $endDate, $endDate));
            $books = $request->fetch();
            if (empty($books)) {
                if ($startDate < $endDate) {
                    $request = $db->prepare("INSERT INTO `bookings` (`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
                    try {
                        $request->execute(array($startDate, $endDate, $_SESSION['id_user'], $idRoom, $price * $nbDays, "in progress"));

                        // rédiriger vers uder_home.php
                        header("Location: user_home.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            } else {
                echo "Chambre pas disponible a cette date";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // se connecter à la base de données
    $db = dbConnexion();

    // preparer la requette pour vérifier si la chambre est disponible entre la date de départ et la date de fin
    $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND ((booking_start_date <= ? AND booking_end_date >= ?) OR (booking_start_date <= ? AND booking_end_date >= ?))");

    // éxécuter la requette
    try {
        $request->execute(array($idRoom, $startDate, $startDate, $endDate, $endDate));

        // récupérer le résultat
        $books = $request->fetch();
        if (empty($books)) {
            if ($startDate < $endDate) {
                // préparer la requette pour résérver la chambre
                $request = $db->prepare("INSERT INTO `bookings` (`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");

                // éxécuter la requette
                try {
                    $request->execute(array($startDate, $endDate, $_SESSION['id_user'], $idRoom, $price * $nbDays, "in progress"));
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            echo "Chambre pas disponible a cette date";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


if(isset($_GET['id_book'])) {

    // se connecter a la bd
    $db = dbConnexion();

    // préparer la requette pour annuler la résérvation
    $request = $db->prepare("UPDATE bookings SET booking_state = ? WHERE id_booking = ?");

    // éxécuter la requette
    try {
        $request->execute(array("cancel", $_GET['id_book']));

        // rédiréction vers "user_home.php"
        header("Location: user_home.php");

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
}