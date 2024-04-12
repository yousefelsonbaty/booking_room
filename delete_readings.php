<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the readings first
    $deleteReadingsQuery = "DELETE FROM sensorreadings WHERE dataID = '$id'";
    $deleteReadingsResult = mysqli_query($connection, $deleteReadingsQuery);

    if (!$deleteReadingsResult) {
        die("Readings deletion failed: " . mysqli_error($connection));
    }

    // Delete associated room
    $deleteRoomQuery = "DELETE FROM room WHERE userID = '$id'";
    $deleteRoomResult = mysqli_query($connection, $deleteRoomQuery);

    if (!$deleteRoomResult) {
        die("Room deletion failed: " . mysqli_error($connection));
    }

    // Delete associated user phones
    $deleteUserPhonesQuery = "DELETE FROM userphones WHERE userID = '$id'";
    $deleteUserPhonesResult = mysqli_query($connection, $deleteUserPhonesQuery);

    if (!$deleteUserPhonesResult) {
        die("User phones deletion failed: " . mysqli_error($connection));
    }

    // Delete the student
    $deleteStudentQuery = "DELETE FROM student WHERE userID = '$id'";
    $deleteStudentResult = mysqli_query($connection, $deleteStudentQuery);

    if (!$deleteStudentResult) {
        die("Student deletion failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?delete_msg=You have deleted the record.');
        exit();
    }
}
?>