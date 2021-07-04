<?php

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, 'tmflix');

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} 
 
    if(isset($_POST['deletedata']))
    {
        $series_id = $_POST['delete_series_id'];
        
        $query = "DELETE FROM series WHERE series_id='$series_id' ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            echo '<script> alert("Records deleted successfully."); </script> ';
            header("Location: index.php");
        } 
        else 
        {
            echo '<script> alert("ERROR: Records failed to delete"); </script>';
            
        }
        
    }
    // Close connection
    mysqli_close($con);


?>