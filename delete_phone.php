<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete associated user phones first
    $deleteUserPhonesQuery = "DELETE FROM userphones WHERE userID = '$id'";
    $deleteUserPhonesResult = mysqli_query($connection, $deleteUserPhonesQuery);

    if (!$deleteUserPhonesResult) {
        die("User phones deletion failed: " . mysqli_error($connection));
    }

    // Delete associated sensor readings
    $deleteReadingsQuery = "DELETE FROM sensorreadings WHERE userID = '$id'";
    $deleteReadingsResult = mysqli_query($connection, $deleteReadingsQuery);

    if (!$deleteReadingsResult) {
        die("Sensor readings deletion failed: " . mysqli_error($connection));
    }

    // Delete the phone
    $deletePhoneQuery = "DELETE FROM phones WHERE phoneID = '$id'";
    $deletePhoneResult = mysqli_query($connection, $deletePhoneQuery);

    if (!$deletePhoneResult) {
        die("Phone deletion failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=You have deleted the record.');
        exit();
    }
}
?>