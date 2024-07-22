<?php

require_once '../../controllers/admineditcontroller.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit schedule</title>
    <link rel="stylesheet" href="../../css/registers.css">
</head>
<body>
    <div class="container">
        <h2>Edit schedule</h2>
        <form action="editschedule.php" method="post">
            <div class="form-group">
                <label for="id">Id:    <?php  echo $id ?></label>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="sdate">Schedule Date:   <?php echo $sdate ?></label>
                <input type="date" id="sdate" name="sdate" value="<?php echo $sdate ?>" >
            </div>
            <div class="form-group">
                <label for="bus">Bus: <?php echo $busnumber ?></label>
                <select id="bus" name="bus" required>
                    <option value="<?php echo $busnumber ?>"><?php echo $busnumber ?></option>
                    <?php
                    // fetching bus to display on bus assigning
                    $sql = "SELECT bus_id, busnumber, capacity FROM buses WHERE status = 'active'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["busnumber"] . "'>" . $row["capacity"] . " " . $row["busnumber"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="origin">Origin: <?php echo $origin ?></label>
                <select id="origin" name="origin" required>
                    <option  value="<?php echo $origin ?>"><?php echo $origin ?></option>
                    <?php
                    // fetching schedules to display on schedule assigning
                    $sql = "SELECT city, county FROM locations";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["city"] . "'>" . $row["city"] ." ". $row["county"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="destination">Destination: <?php echo $destination ?></label>
                <select id="destination" name="destination" required>
                    <option value="<?php echo $destination ?>"><?php echo $destination ?></option>
                    <?php
                    // fetching schedules to display on schedule assigning
                    $sql = "SELECT city, county FROM locations";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["city"] . "'>" . $row["city"] ." ". $row["county"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="departuretime">Departure Time: <?php echo $departuretime ?></label>
                <input type="time" id="departuretime" name="departuretime" value="<?php echo $departuretime ?>" required>
            </div>
            <div class="form-group">
                <label for="fare">Fare: <?php echo $fare ?></label>
                <input type="number" id="fare" name="fare" value="<?php echo $fare ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="updateschedule">Update Schedule</button>
            </div><br>

            <p>Go back home? <a href="../schedules.php">Home</a></p>

           
        </form>
    </div>
</body>
</html>
