<?php
session_start();

//si $_SESSION['role'] est definie mais que sa valeur est différents de admin ou encore que $_SESSIOn['role']n'est pas definie

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {

    header('Location: login.php');

}

include_once "/inc/header.php"; ?>



<div class="container d-flex flex-wrap">

    <div class="card m-3" style="width: 18rem;">

        <i class="fa-solid fa-plus text-center mt-3"></i>

        <div class="card-body">

            <h5 class="card-title">Ajout hôtel</h5>

            <p class="card-text">Cliquez ici pour ajouter un hôtel.</p>

            <a href="add_hotel.php" class="btn btn-primary mt-4">Ajouter un hôtel</a>

        </div>

    </div>



    <div class="card m-3" style="width: 18rem;">

        <i class="fa-solid fa-plus text-center mt-3"></i>

        <div class="card-body">

            <h5 class="card-title">Ajout chambre</h5>

            <p class="card-text">Cliquez ici pour ajouter une chambre.</p>

            <a href="add_room.php" class="btn btn-primary">Ajouter une chambre</a>

        </div>

    </div>



    <div class="card m-3" style="width: 18rem;">

        <i class="fa-solid fa-list text-center mt-3"></i>

        <div class="card-body">

            <h5 class="card-title">Liste réservation</h5>

            <p class="card-text">Cliquez ici pour la liste des réservations.</p>

            <a href="#" class="btn btn-primary">Liste de réservation</a>

        </div>

    </div>



    <div class="card m-3" style="width: 18rem;">

        <i class="fa-solid fa-list text-center mt-3"></i>

        <div class="card-body">

            <h5 class="card-title">Liste hôtel</h5>

            <p class="card-text">Cliquez ici pour la liste des hôtel.</p>

            <a href="hotel_list.php" class="btn btn-primary">Liste d'Hôtel</a>

        </div>

    </div>



    <div class="card m-3" style="width: 18rem;">

        <i class="fa-solid fa-list text-center mt-3"></i>

        <div class="card-body">

            <h5 class="card-title">Liste chambre</h5>

            <p class="card-text">Cliquez ici pour la liste des chambres.</p>

            <a href="room_list.php" class="btn btn-primary">Liste des chambres</a>

        </div>

    </div>

</div>



<?php include_once "/inc/footer.php"; ?>