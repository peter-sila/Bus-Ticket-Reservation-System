<?php

require_once '../../controllers/admineditcontroller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit booking</title>
    <link rel="stylesheet" href="../../css/registers.css">
</head>
<body>
    <div class="container">
        <h2>Edit booking</h2>
        <form action="editbooking.php" method="post">
            <div class="form-group">
                <label for="id">Id:    <?php  echo $id; ?></label>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="paymentstatus">Payment Status: <?php echo $paymentstatus; ?></label>
                <select id="paymentstatus" name="paymentstatus" required>
                    <option  value="<?php echo $paymentstatus ?>"><?php echo $paymentstatus; ?></option>
                    <option value="Completed">Completed</option>
                    <option value="Pedding">Pedding</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="updatebooking">Update Booking</button>
            </div><br>

            <p>Go back home? <a href="../bookings.php">Home</a></p>

           
        </form>
        
    </div>
</body>
</html>
