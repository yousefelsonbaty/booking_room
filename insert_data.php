<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_students'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : ''; // Fix the undefined array key

        if ($email == "" || empty($email)) {
            header('Location: index.php?message=You need to fill in the email!');
            exit();
        } elseif ($password == "" || empty($password)) {
            header('Location: index.php?message=You need to fill in the password!');
            exit();
        } elseif ($fname == "" || empty($fname)) {
            header('Location: index.php?message=You need to fill in the first name!');
            exit();
        } elseif ($lname == "" || empty($lname)) {
            header('Location: index.php?message=You need to fill in the last name!');
            exit();
        } else {
            // Get the last inserted ID from the student table
            $query = "SELECT MAX(userID) as maxID FROM student";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $newuserID = $row['maxID'] + 1;

            // Insert the new student record with the auto-incremented ID
            $insertQuery = "INSERT INTO student (userID, Email, Password, firstName, lastName) VALUES ('$newuserID', '$email', '$password', '$fname', '$lname')";
            $insertResult = mysqli_query($connection, $insertQuery);

            // Get the last inserted ID from the phones table
            $query = "SELECT MAX(phoneID) as maxID FROM phones";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $newPhoneID = $row['maxID'] + 1;

            // Insert the new phone record with the auto-incremented ID and the linked foreign key
            $insertQuery = "INSERT INTO phones (phoneID, phonenumber) VALUES ('$newPhoneID', '$phonenumber')";
            $insertResult = mysqli_query($connection, $insertQuery);

            // Insert the new record in the 'userphones' table with the linked foreign key
            $insertQuery = "INSERT INTO userphones (userID, phoneID) VALUES ('$newuserID', '$newPhoneID')";
            $insertResult = mysqli_query($connection, $insertQuery);

            // Get the last inserted ID from the booking table
            $query = "SELECT MAX(bookingID) as maxID FROM booking";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $newBookingID = $row['maxID'] + 1;

            // Insert the new booking record with the auto-incremented ID and the linked foreign key
            $insertQuery = "INSERT INTO booking (bookingID, userID) VALUES ('$newBookingID', '$newuserID')";
            $insertResult = mysqli_query($connection, $insertQuery);    

            // Get the last inserted ID from the room table
            $query = "SELECT MAX(roomID) as maxID FROM room";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $newRoomID = $row['maxID'] + 1;

            // Insert the new room record with the auto-incremented ID and the linked foreign key
            $insertQuery = "INSERT INTO room (roomID, userID) VALUES ('$newRoomID', '$newuserID')";
            $insertResult = mysqli_query($connection, $insertQuery);

            // Get the last inserted ID from the sensorReadings table
            $query = "SELECT MAX(dataID) as maxID FROM sensorReadings";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $newDataID = $row['maxID'] + 1;

            // Insert the new sensor reading record with the auto-incremented ID and the linked foreign key
            $insertQuery = "INSERT INTO sensorReadings (dataID, userID, roomID) VALUES ('$newDataID', '$newuserID', '$newRoomID')";
            $insertResult = mysqli_query($connection, $insertQuery);

            if (!$insertResult) {
                die("Query Failed: " . mysqli_error($connection));
            } else {
                header('Location: index.php?insert_msg=Your data has been added successfully!');
                exit();
            }
        }
    }
}
?>