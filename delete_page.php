<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete associated sensor readings
    $deleteReadingsQuery = "DELETE FROM sensorreadings WHERE roomID IN (SELECT roomID FROM room WHERE userID = '$id')";
    $deleteReadingsResult = mysqli_query($connection, $deleteReadingsQuery);

    if (!$deleteReadingsResult) {
        die("Sensor readings deletion failed: " . mysqli_error($connection));
    }

    // Delete associated bookings
    $deleteBookingsQuery = "DELETE FROM booking WHERE userID = '$id'";
    $deleteBookingsResult = mysqli_query($connection, $deleteBookingsQuery);

    if (!$deleteBookingsResult) {
        die("Bookings deletion failed: " . mysqli_error($connection));
    }

    // Delete associated user phones
    $deleteUserPhonesQuery = "DELETE FROM userphones WHERE userID = '$id'";
    $deleteUserPhonesResult = mysqli_query($connection, $deleteUserPhonesQuery);

    if (!$deleteUserPhonesResult) {
        die("User phones deletion failed: " . mysqli_error($connection));
    }

    // Delete associated rooms
    $deleteRoomsQuery = "DELETE FROM room WHERE userID = '$id'";
    $deleteRoomsResult = mysqli_query($connection, $deleteRoomsQuery);

    if (!$deleteRoomsResult) {
        die("Rooms deletion failed: " . mysqli_error($connection));
    }

    // Delete the student
    $deleteStudentQuery = "DELETE FROM student WHERE userID = '$id'";
    $deleteStudentResult = mysqli_query($connection, $deleteStudentQuery);

    if (!$deleteStudentResult) {
        die("Student deletion failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=You have deleted the record.');
    }
}
?>