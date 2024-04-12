<?php
include('header.php');
include('dbcon.php');
?>

<div class="box1">
  <h2>ALL STUDENTS</h2>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>User ID</th>
      <th>Email</th>
      <th>Password</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM student";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td><a href='update_page_1.php?id=" . $row['userID'] . "' class='btn btn-success'>Update</a></td>";
            echo "<td><a href='delete_page.php?id=" . $row['userID'] ."' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>

<?php
if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
}
?>

<?php
if(isset($_GET['insert_msg'])){
    echo "<h6>".$_GET['insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['update_msg'])){
    echo "<h6>".$_GET['update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="f_name">First Name</label>
          <input type="text" name="f_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="l_name">Last Name</label>
          <input type="text" name="l_name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<div class="box2">
  <h2 class="text-left">ALL PHONE NUMBERS</h2>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>Phone ID</th>
      <th>Phone Number</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM phones";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else{
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['phoneID'] . "</td>";
            echo "<td>" . $row['phoneNumber'] . "</td>";
            echo "<td><a href='update_phone.php?id=" . $row['phoneID'] . "' class='btn btn-success'>Update</a></td>";
            echo "<td><a href='delete_phone.php?id=" . $row['phoneID'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>

<?php
if(isset($_GET['phone_insert_msg'])){
    echo "<h6>".$_GET['phone_insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['phone_update_msg'])){
    echo "<h6>".$_GET['phone_update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['phone_delete_msg'])){
    echo "<h6>".$_GET['phone_delete_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insert_phone.php" method="post">
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" name="phonenumber" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_phone" value="Add Phone">
      </div>
    </div>
  </div>
</div>
</form>

<div class="box3">
  <h2>ALL SPECIFIC USERS' PHONE NUMBERS</h2>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>User ID</th>
      <th>Phone ID</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM userphones";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die("Query Failed: " . mysqli_error($connection));
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['userID'] . "</td>";
        echo "<td>" . $row['phoneID'] . "</td>";
        echo "<td><a href='update_page_1.php?id=" . $row['userID'] . "' class='btn btn-success'>Update</a></td>";
        echo "<td><a href='delete_page.php?id=" . $row['userID'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
      }
    }
    ?>
  </tbody>
</table>

<div class="box4">
  <div class="d-flex justify-content-between align-items-center">
    <h2 class="text-left m-0">ALL BOOKINGS</h2>
  </div>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>Booking ID</th>
      <th>User ID</th>
      <th>Purpose</th>
      <th>Date</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM booking";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['bookingID'] . "</td>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . (isset($row['Purpose']) ? $row['Purpose'] : '') . "</td>";
            echo "<td>" . (isset($row['Date']) ? $row['Date'] : '') . "</td>";
            echo "<td>" . $row['startTime'] . "</td>";
            echo "<td>" . $row['endTime'] . "</td>";
            echo "<td><a href='update_booking.php?id=" . $row['bookingID'] . "' class='btn btn-success'>Update</a></td>";
            echo "<td><a href='delete_booking.php?id=" . $row['bookingID'] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    ?>
  </tbody>
</table>

<?php
if(isset($_GET['booking_insert_msg'])){
    echo "<h6>".$_GET['booking_insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['booking_update_msg'])){
    echo "<h6>".$_GET['booking_update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['booking_delete_msg'])){
    echo "<h6>".$_GET['booking_delete_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insert_booking.php" method="post">
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="purpose">Purpose</label>
          <input type="text" name="purpose" class="form-control">
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
          <label for="starttime">Start Time</label>
          <input type="time" name="starttime" class="form-control">
        </div>
        <div class="form-group">
          <label for="endtime">End Time</label>
          <input type="time" name="endtime" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_booking" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<div class="box5">
  <div class="d-flex justify-content-between align-items-center">
    <h2 class="m-0">ALL ROOMS</h2>
  </div>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>Room ID</th>
            <th>User ID</th>
            <th>Room Number</th>
            <th>Location</th>
            <th>Availability</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM room";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['roomID'] . "</td>";
                echo "<td>" . $row['userID'] . "</td>";
                echo "<td>" . $row['roomNo'] . "</td>";
                echo "<td>" . (isset($row['Location']) ? $row['Location'] : '') . "</td>";
                echo "<td>" . (isset($row['Availability']) ? $row['Availability'] : '') . "</td>";
                echo "<td><a href='update_room.php?id=" . $row['roomID'] . "' class='btn btn-success'>Update</a></td>";
                echo "<td><a href='delete_room.php?id=" . $row['roomID'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<?php
if(isset($_GET['room_insert_msg'])){
    echo "<h6>".$_GET['room_insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['room_update_msg'])){
    echo "<h6>".$_GET['room_update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['room_delete_msg'])){
    echo "<h6>".$_GET['room_delete_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insert_room.php" method="post">
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roomnumber">Room Number</label>
                        <input type="text" name="roomnumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select name="availability" class="form-control" required>
                            <option value="Available">Available</option>
                            <option value="Reserved">Reserved</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_room" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<div class="box6">
  <div class="d-flex justify-content-between align-items-center">
    <h2 class="m-0">ALL READINGS</h2>
  </div>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>Data ID</th>
            <th>User ID</th>
            <th>Room ID</th>
            <th>Motion</th>
            <th>Comfort Level</th>
            <th>Humidity</th>
            <th>Air Quality</th>
            <th>Temperature</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM sensorreadings";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['dataID'] . "</td>";
                echo "<td>" . $row['userID'] . "</td>";
                echo "<td>" . $row['roomID'] . "</td>";
                echo "<td>" . $row['Motion'] . "</td>";
                echo "<td>" . $row['comfortLevel'] . "</td>";
                echo "<td>" . $row['Humidity'] . "</td>";
                echo "<td>" . $row['airQuality'] . "</td>";
                echo "<td>" . $row['Temperature'] . "</td>";
                echo "<td><a href='update_readings.php?id=" . $row['dataID'] . "' class='btn btn-success'>Update</a></td>";
                echo "<td><a href='delete_readings.php?id=" . $row['dataID'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<?php
if(isset($_GET['readings_insert_msg'])){
    echo "<h6>".$_GET['readings_insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['readings_update_msg'])){
    echo "<h6>".$_GET['readings_update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['readings_delete_msg'])){
    echo "<h6>".$_GET['readings_delete_msg']."</h6>";
}
?>

<!-- Modal -->
<form action="insert_readings.php" method="post">
    <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="motion">Motion</label>
                        <select name="motion" class="form-control" required>
                            <option value="T">T</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comfortlevel">Comfort Level</label>
                        <select name="comfortlevel" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="humidity">Humidity</label>
                        <input name="humidity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="airquality">Air Quality</label>
                        <input type="text" name="airquality" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="temperature">Temperature</label>
                        <input type="text" name="temperature" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_reading" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php
mysqli_close($connection);
include('footer.php');
?>