<?php
include "config.php";
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM student WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        // echo "Deleted Successfully.";
        header("Location: index.php");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>