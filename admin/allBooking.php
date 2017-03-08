<?php
include_once "../vendor/autoload.php";
use App\Model\Booking\Booking;
$booking = new Booking();
$allBooking = $booking->selectAll();
include_once "header.php";
?>
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Tour Package</th>
                                <th>Person No</th>
<!--                                <th>Total Cost</th>-->
                                <th>Payment Method</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sl=0; foreach($allBooking as $booking){ $sl++;?>
                                <tr>
                                    <td><?php echo $sl;?></td>
                                    <td><?php echo $booking->name; ?></td>
                                    <td><?php echo $booking->email; ?></td>
                                    <td><?php echo $booking->phone; ?></td>
                                    <td><?php echo $booking->address; ?></td>
                                    <td><?php echo $booking->country; ?></td>
                                    <td><?php echo $booking->tour_package; ?></td>
                                    <td><?php echo $booking->person_no; ?></td>
                                    <!--<td><?php /*echo $totalCost; */?></td>-->
                                    <td><?php echo $booking->payment_method; ?></td>
                                    <td><?php echo $booking->acc_number; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="bookingEdit.php?id=<?php echo $booking->id; ?>">Edit</a>
                                        <a class="btn btn-warning" href="bookingDelete.php?id=<?php echo $booking->id; ?>">Delete</a>
                                        <a class="btn btn-default" href="bookingTrash.php?id=<?php echo $booking->id; ?>">Trash</a>
                                        <a class="btn btn-default" href="bookingMail.php?id=<?php echo $booking->id; ?>">Mail</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include_once"footer.php"; ?>