<?php
include('header.php');
include('dbcon.php');

$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM sensorReadings WHERE dataID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_reading'])) {
    $motion = $_POST['motion'];
    $comfortlevel = $_POST['comfortlevel'];
    $humidity = $_POST['humidity'];
    $airquality = $_POST['airquality'];
    $temperature = $_POST['temperature'];

    $query = "UPDATE sensorReadings SET Motion = '$motion', comfortLevel = '$comfortlevel', Humidity = '$humidity', airQuality = '$airquality', Temperature = '$temperature' WHERE dataID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?readings_update_msg=You have successfully updated the data.');
        exit();
    }
}
?>

<form action="update_readings.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="motion">Motion</label>
        <input type="text" name="motion" class="form-control" value="<?php echo isset($row['Motion']) ? $row['Motion'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="comfortlevel">Comfort Level</label>
        <input type="text" name="comfortlevel" class="form-control" value="<?php echo isset($row['comfortLevel']) ? $row['comfortLevel'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="humidity">Humidity</label>
        <input type="text" name="humidity" class="form-control" value="<?php echo isset($row['Humidity']) ? $row['Humidity'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="airquality">Air Quality</label>
        <input type="text" name="airquality" class="form-control" value="<?php echo isset($row['airQuality']) ? $row['airQuality'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="temperature">Temperature</label>
        <input type="text" name="temperature" class="form-control" value="<?php echo isset($row['Temperature']) ? $row['Temperature'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_reading" value="UPDATE">
</form>

<?php include('footer.php'); ?>