<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
    require 'config.php';
    if(isset($_POST["submit"])){
        $rollNo = $_POST["rollNo"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM student WHERE rollNo = '$rollNo'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"]){
                header("Location: index.php");
            }
            else{
                echo "<script> alert('Incorrect Password.'); </script>";
            }
        }
        else{
            echo "<script> alert('You do not have an account. Kindly register.'); </script>";
        }
    }
    ?>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="rollNo">Roll No.: </label>
        <input type="text" name = "rollNo" required value = ""><br>
        <label for="password">Password: </label>
        <input type="password" name = "password" required value = ""><br>
        <button type = "submit" name = "submit">Login</button>
    </form>
    <br>
    <a href = "registration.php">Register</a>
</body>
</html>