<?php

require_once '../../controllers/admineditcontroller.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
    <link rel="stylesheet" href="../../css/registers.css">
</head>
<body>
    <div class="container">
        <h2>Edit Bus</h2>
        <form action="editbus.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            <label for="busnumber">Bus number:  <?php echo $busnumber; ?></label><br>
            <input type="hidden" id="busnumber" name="busnumber" value="<?php echo $busnumber; ?>"><br>
            <label for="capacity">Capacity:  <?php echo $capacity; ?></label><br>
            <input type="hidden" id="capacity" name="capacity" value="<?php echo $capacity; ?>"><br>
            <label for="status">Status <?php echo $status; ?></label><br>
            <select name="status" id="status">
                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select><br><br>
            <button type="submit" name="updatebus">Update Bus</button>
            <br>
            <p>Go back home? <a href="../buses.php">Home</a></p>
            
        </form>
    </div>
</body>
</html>
