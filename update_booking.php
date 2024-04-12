<?php
include('header.php');
include('dbcon.php');

$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM booking WHERE bookingID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_booking'])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id']; 
    }

    $purpose = $_POST['purpose'];
    $date = $_POST['date'];
    $starttime = $_POST['start_time'];
    $endtime = $_POST['end_time'];

    $query = "UPDATE booking SET Purpose = '$purpose', Date = '$date', startTime = '$starttime', endTime = '$endtime' WHERE bookingID = '$idnew'"; 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
    }
}
?>

<form action="update_booking.php?id=<?php echo $id; ?>" method="post"> 
    <div class="form-group">
        <label for="purpose">Purpose</label>
        <input type="text" name="purpose" class="form-control" value="<?php echo isset($row['Purpose']) ? $row['Purpose'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" name="date" class="form-control" value="<?php echo isset($row['Date']) ? $row['Date'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="text" name="start_time" class="form-control" value="<?php echo isset($row['startTime']) ? $row['startTime'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="text" name="end_time" class="form-control" value="<?php echo isset($row['EndTime']) ? $row['EndTime'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_booking" value="UPDATE">
</form>

<?php include('footer.php'); ?>