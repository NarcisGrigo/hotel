<?php include_once "inc/header.php"; ?>

<div class="container">
    <form action="connexion.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="submit"
                value="submit">Submit</button>
    </form>
</div>

<?php include_once "inc/footer.php"; ?>