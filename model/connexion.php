<?php
session_start();
require_once "/inc/database.php";
if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // connecting to the database
    $db = dbConnexion();

    // preparing the request
    $request = $db->prepare("SELECT * FROM users WHERE email = ?");

    // executing the request
    try {
        $request->execute(array($email));

        // retrieving the result of the request
        $userInfo = $request->fetch(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($userInfo);
        // echo "</pre>";
        if (empty($userInfo)) {
            echo "user unknown";
        } else {

            // verify if the password is correct
            if (password_verify($password, $userInfo['password'])) {

                // verify if the user is an admin
                if ($userInfo['role'] == "admin") {
                    $_SESSION['role'] = $userInfo['role'];
                    header("Location: admin/admin.php");
                } else {
                    // définir la variable de session role
                    $_SESSION['role'] = $userInfo['role'];
                    $_SESSION['id_user'] = $userInfo['id_user'];
                    header("Location: user_home.php");
                }
            } else {
                echo "Oh, you're being clever !!";
            }
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}