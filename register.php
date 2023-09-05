<?php
session_start();
include_once "inc/header.php";
?>

<div class="container">
    <form action="model/inscription.php" method="post">
        <div class="form-group mt-5 mb-5 d-flex">
            <label class="me-xl-5">Gender:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                <label class="form-check-label">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                <label class="form-check-label">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="O">
                <label class="form-check-label">Other</label>
            </div>
        </div>

        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="form-group">
            <label>Phone number:</label>
            <input type="text" class="form-control" name="phone">
        </div>

        <div class="form-group">
            <label>Birthday:</label>
            <input type="date" class="form-control" name="birthday">
        </div>


        <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit" value="submit">Submit</button>
    </form>
</div>

<?php include_once "inc/footer.php"; ?>