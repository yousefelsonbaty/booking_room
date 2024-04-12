<?php
include('header.php');
include('dbcon.php');

$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM phones WHERE phoneID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_phones'])) {
    $phoneid = $_GET['id']; // Get the phone ID from the URL
    
    $phonenumber = $_POST['phonenumber'];

    $query = "UPDATE phones SET phoneNumber = '$phonenumber' WHERE phoneID = '$phoneid'"; 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
        exit();
    }
}
?>

<form action="update_phone.php?id=<?php echo $id; ?>" method="post"> 
    <div class="form-group">
        <label for="phonenumber">Phone Number</label>
        <input type="text" name="phonenumber" class="form-control" value="<?php echo isset($row['phoneNumber']) ? $row['phoneNumber'] : ''; ?>">
    </div>
    
    <input type="submit" class="btn btn-success" name="update_phones" value="UPDATE">
</form>

<?php include('footer.php'); ?>