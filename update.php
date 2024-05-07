<?php
include "config.php";

$fullName = '';
$rollNo = '';
$mobile = '';
$email = '';
$password = '';
$id='';

if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];

    $query = "SELECT * FROM student WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $fullName = $row["fullName"];
        $rollNo = $row["rollNo"];
        $mobile = $row["mobile"];
        $email = $row["email"];
        $password = $row["password"];
    }
    else{
        echo "User not found";
        exit();
    }

}

if(isset($_POST['submit'])){
    $fullName = $_POST["fullName"];
    $rollNo = $_POST["rollNo"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_POST['id'];

    $query = "UPDATE student SET fullName='$fullName', rollNo='$rollNo', mobile='$mobile', email='$email', password='$password' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: index.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<form action="update.php" method="post">
        <label for="fullName">Full Name: </label>
        <input type="text" name = "fullName"  required value = "<?php echo $fullName; ?>"><br>
        <label for="rollNo">Roll No.: </label>
        <input type="text" name = "rollNo"  required value = "<?php echo $rollNo; ?>"><br>
        <label for="mobile">Mobile No.: </label>
        <input type="text" name = "mobile"  required value = "<?php echo $mobile; ?>"><br>
        <label for="email">Email ID: </label>
        <input type="email" name = "email"  required value = "<?php echo $email; ?>"><br>
        <label for="password">Password: </label>
        <input type="password" name = "password"  required value = "<?php echo $password; ?>"><br>
        <input type="text" name = "id"  required value = "<?php echo $id; ?>" style="display:none;"><br>
        <button type="submit" name = "submit">Update</button>
    </form>
</body>
</html>