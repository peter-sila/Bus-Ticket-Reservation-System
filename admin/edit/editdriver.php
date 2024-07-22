<?php

require_once '../../controllers/admineditcontroller.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Driver</title>
    <link rel="stylesheet" href="../../css/registers.css">
</head>
<body>
    <div class="container">
        <h2>Edit Driver</h2>
        <form action="editdriver.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
            <label for="name">Driver Name:  <?php echo $name; ?></label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
            <label for="phonenumber">Phone Number:  <?php echo $phonenumber; ?></label><br>
            <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>"><br>
            <label for="email">Email:  <?php echo $email; ?></label><br>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label for="idpassport">Id/Passport: <?php echo $idpassport; ?></label><br>
            <input type="text" id="idpassport" name="idpassport" value="<?php echo $idpassport; ?>"><br><br>

            <button type="submit" name="updatedriver">Update Driver</button><br>

            <p>Go back home? <a href="../drivers.php">Home</a></p>
            
        </form>
    </div>
</body>
</html>
