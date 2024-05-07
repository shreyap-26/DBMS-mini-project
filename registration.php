<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <?php
    require 'config.php';
    if(isset($_POST["submit"])){
        $fullName = $_POST["fullName"];
        $rollNo = $_POST["rollNo"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $sql = "SELECT * FROM student WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowsCount = mysqli_num_rows($result);
        if($rowsCount>0){
            echo "<script> alert('Email is already taken'); </script>";
        }
        else{
            if($password == $confirmPassword){
                $query = "INSERT INTO student VALUES('', '$fullName', '$rollNo', '$mobile', '$email', '$password')";
                $result = mysqli_query($conn, $query);
                if($result){
                    header("Location: index.php");
                }
                // echo "<script> alert('Registration Successful !!'); </script>";
            }
            else{
                echo "<script> alert('Password does not match.'); </script>";
            }
        }
    }
    ?>
    <h1>Register</h1>
    <form action="registration.php" method="post">
        <label for="fullName">Full Name: </label>
        <input type="text" name = "fullName"  required value = ""><br>
        <label for="rollNo">Roll No.: </label>
        <input type="text" name = "rollNo"  required value = ""><br>
        <label for="mobile">Mobile No.: </label>
        <input type="text" name = "mobile"  required value = ""><br>
        <label for="email">Email ID: </label>
        <input type="email" name = "email"  required value = ""><br>
        <label for="password">Password: </label>
        <input type="password" name = "password"  required value = ""><br>
        <label for="confirmPassword">Confirm Password: </label>
        <input type="password" name = "confirmPassword"  required value = ""><br>
        <button type="submit" name = "submit">Register</button>
    </form>
    <br>
    <a href = "login.php">Login</a>
</body>
</html>