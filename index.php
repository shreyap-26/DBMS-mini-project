<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<form action="search.php" method="GET">
        <label for="searchQuery">Enter Roll No.:</label>
        <input type="text" id="searchQuery" name="searchQuery">
        <button type="submit">Search</button>
    </form>
    <div class="container" style="display:none">
        <button class = "btn btn-primary">
            <a href="registration.php" class = "text-light">Add Student</a>
        </button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Roll No.</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Email ID</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "config.php";
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
      $id = $row['id'];
      $fullName = $row['fullName'];
      $rollNo = $row['rollNo'];
      $mobile = $row['mobile'];
      $email = $row['email'];
      $password = $row['password'];
      echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$fullName.'</td>
      <td>'.$rollNo.'</td>
      <td>'.$mobile.'</td>
      <td>'.$email.'</td>
      <td>'.$password.'</td>
      <td>
      <button class = "btn btn-primary"><a href="update.php? updateid='.$id.'" class = "text-light">Update</a></button>
      <button class = "btn btn-danger"><a href="delete.php? deleteid='.$id.'" class = "text-light">Delete</a></button>
      </td>
      </tr>';
      }

    }
    ?>
    
  </tbody>
</table>
    </div>
</body>
</html>