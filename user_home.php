<?php
session_start();
require_once "model/functions.php";
include_once "inc/header.php";

$userBookList = userBookList($_SESSION['id_user']);
$price = 0;
?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id Reservation</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>State</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($userBookList as $book) {
                $price += $book['booking_price'];
                ?>
                <tr>
                    <td>
                        <?php echo $book['id_booking']; ?>
                    </td>
                    <td>
                        <?= $book['booking_start_date']; ?>
                    </td>
                    <td>
                        <?= $book['booking_end_date']; ?>
                    </td>
                    <td>
                        <?= $book['booking_state']; ?>
                    </td>
                    <td>
                        <?= $book['booking_price']; ?>
                    </td>
                    <td>
                        <a class="btn btn-warning"
                            href="model/db_booking.php?id_book=<?= $book['id_booking']; ?>">Cancel</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="bg-black text-light" colspan="4">Total de vos résérvations:</td>
                <td class="bg-black text-light" colspan="2"><?= $price; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<?php include_once "inc/footer.php"; ?>