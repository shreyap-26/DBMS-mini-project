<?php
include "config.php";

// Check if the search query parameter is set
if(isset($_GET['searchQuery'])){
    // Sanitize the search query to prevent SQL injection
    $searchQuery = mysqli_real_escape_string($conn, $_GET['searchQuery']);

    // Perform the search query
    $sql = "SELECT * FROM student WHERE rollNo='$searchQuery'";
    $result = mysqli_query($conn, $sql);

    if($result){
        // Display the search results
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Sr.No</th><th>Name</th><th>Roll No.</th><th>Mobile No.</th><th>Email ID</th><th>Password</th><th>Operations</th></tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['fullName']."</td>";
            echo "<td>".$row['rollNo']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td><a href='update.php?updateid=".$row['id']."'>Update</a> | <a href='delete.php?deleteid=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
?>
