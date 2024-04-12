<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the associated sensor readings first
    $deleteReadingsQuery = "DELETE FROM sensorreadings WHERE roomID = '$id'";
    $deleteReadingsResult = mysqli_query($connection, $deleteReadingsQuery);

    if (!$deleteReadingsResult) {
        die("Sensor readings deletion failed: " . mysqli_error($connection));
    }

    // Delete the room
    $deleteRoomQuery = "DELETE FROM room WHERE roomID = '$id'";
    $deleteRoomResult = mysqli_query($connection, $deleteRoomQuery);

    if (!$deleteRoomResult) {
        die("Room deletion failed: " . mysqli_error($connection));
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