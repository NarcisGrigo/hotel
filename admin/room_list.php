<?php include_once '../inc/header.php';

require_once '../model/functions.php';

$listRoom = roomList();

?>

<div class="container">

    <table class="table">

        <thead>

            <tr>

                <th>Id Room</th>

                <th>Room Number</th>

                <th>Price</th>

                <th>Persons</th>

                <th>Capacity</th>

                <th>Room State</th>

                <th>Hotel Id</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($listRoom as $room) { ?>
                <tr>
                    <td>

                        <?php echo $room['id_room']; ?>

                    </td>

                    <td>

                        <?= $room['room_number']; ?>

                    </td>

                    <td>

                        <?= $room['price']; ?>

                    </td>

                    <td>

                        <?= $room['persons']; ?>

                    </td>

                    <td>

                        <?= $room['category']; ?>

                    </td>

                    <td>

                        <?= $room['room_state']; ?>

                    </td>

                    <td>

                        <?= $room['hotel_id']; ?>

                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>

</div>

<?php include_once '../inc/footer.php' ?>