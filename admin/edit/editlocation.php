<?php

require_once '../../controllers/admineditcontroller.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit location</title>
    <link rel="stylesheet" href="../../css/registers.css">
</head>
<body>
    <div class="container">
        <h2>Edit location</h2>
        <form action="editlocation.php" method="post">
            <label for="id">Id: <?php echo $id; ?></label>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="city">City:  <?php echo $city; ?></label><br>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>"><br>
            <label for="county">County:  <?php echo $county; ?></label><br>
            <input type="text" id="county" name="county" value="<?php echo $county; ?>"><br><br>

            <button type="submit" name="updatelocation">Update Location</button>
            <br>
            <p>Go back home? <a href="../locations.php">Home</a></p>
            
        </form>
    </div>
</body>
</html>
