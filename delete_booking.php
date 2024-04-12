<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the booking
    $deleteBookingQuery = "DELETE FROM booking WHERE bookingID = '$id'";
    $deleteBookingResult = mysqli_query($connection, $deleteBookingQuery);

    if (!$deleteBookingResult) {
        die("Booking deletion failed: " . mysqli_error($connection));
    }

    // Delete associated student
    $deleteStudentQuery = "DELETE FROM student WHERE userID = '$id'";
    $deleteStudentResult = mysqli_query($connection, $deleteStudentQuery);

    if (!$deleteStudentResult) {
        die("Student deletion failed: " . mysqli_error($connection));
    }

    // Delete associated user phones
    $deleteUserPhonesQuery = "DELETE FROM userphones WHERE userID = '$id'";
    $deleteUserPhonesResult = mysqli_query($connection, $deleteUserPhonesQuery);

    if (!$deleteUserPhonesResult) {
        die("User phones deletion failed: " . mysqli_error($connection));
    }

    // Delete associated room
    $deleteRoomQuery = "DELETE FROM room WHERE userID = '$id'";
    $deleteRoomResult = mysqli_query($connection, $deleteRoomQuery);

    if (!$deleteRoomResult) {
        die("Room deletion failed: " . mysqli_error($connection));
    }

    // Delete associated sensor readings
    $deleteReadingsQuery = "DELETE FROM sensorreadings WHERE userID = '$id'";
    $deleteReadingsResult = mysqli_query($connection, $deleteReadingsQuery);

    if (!$deleteReadingsResult) {
        die("Sensor readings deletion failed: " . mysqli_error($connection));
    }

    header('location:index.php?delete_msg=You have deleted the record.');
}
?>