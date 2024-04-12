<?php
include('header.php');
include('dbcon.php');

$row = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE userID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_students'])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id']; 
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];

    $query = "UPDATE student SET Email = '$email', Password = '$password', firstName = '$fname', lastName = '$lname' WHERE userID = '$idnew'"; 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=You have successfully updated the data.');
    }
}
?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post"> 
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo isset($row['Password']) ? $row['Password'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo isset($row['firstName']) ? $row['firstName'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo isset($row['lastName']) ? $row['lastName'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>