<?php
require_once("inc/database.php");
if (isset($_POST['submit'])) {
    // recovering the infos of the user
    $lastName = htmlspecialchars($_POST['lastname']);
    $firstName = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $address = htmlspecialchars($_POST['address']);
    $phoneNumber = htmlspecialchars($_POST['phone']);
    $birthday = htmlspecialchars($_POST['birthday']);
    $gender = htmlspecialchars($_POST['gender']);

    // crypting the password
    $cryptedPsw = password_hash($password, PASSWORD_DEFAULT);

    // connecting to the database
    $db = dbConnexion();

    // preparing the request
    $request = $db->prepare("INSERT INTO `users`(`last_name`, `first_name`, `email`, `password`, `birthday`, `address`, `phone_number`, `gender`) VALUES (?,?,?,?,?,?,?,?)");

    // executing the request
    try {
        $request->execute(array($lastName, $firstName, $email, $cryptedPsw, $birthday, $address, $phoneNumber, $gender));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}