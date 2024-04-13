<?php
include('dbcon.php');

$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM room WHERE roomID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_room'])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id'];
    }

    $roomnumber = $_POST['roomnumber'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];

    $query = "UPDATE room SET roomNo = '$roomnumber', Location = '$location', Availability = '$availability' WHERE roomID = '$idnew'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
    }
}
?>

<form action="delete_room.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="roomnumber">Room Number</label>
        <input type="text" name="roomnumber" class="form-control" value="<?php echo isset($row['roomNo']) ? $row['roomNo'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo isset($row['Location']) ? $row['Location'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="availability">Availability</label>
        <input type="text" name="availability" class="form-control" value="<?php echo isset($row['Availability']) ? $row['Availability'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_room" value="UPDATE">
</form>

<?php include('footer.php'); ?>