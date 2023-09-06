<?php include_once "/inc/header.php"; ?>
<div class="container">

    <form action="/model/db_hotel.php" method="post">

        <div class="form-group">



            <div class="form-group">

                <label>Name :</label>

                <input type="text" class="form-control" name="name_hotel">

            </div>



            <div class="form-group">

                <label>Location :</label>

                <input type="text" class="form-control" name="location_hotel">

            </div>



            <div class="form-group">

                <label>capacity :</label>

                <input type="number" class="form-control" name="capacity_hotel">

            </div>





            <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="add_hotel" value="submit">Add
                Hotel</button>

    </form>

</div>
<?php include_once "/inc/footer.php"; ?>