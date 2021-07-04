<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

//Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['save-multiple-dir']))
{
    $series_id = $_POST['series_id'];
    $directors = $_POST['directors'];

    foreach($directors as $rowdir)
    {
        //echo $rowdir
        $query = "INSERT INTO series_director (series_id, dir_id) VALUES ('$series_id', '$rowdir') ";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Director inserted successfully.";
        header("Location: director.php"); 
        exit;

    } 
    else
    {
        header("Location: director.php"); 
        echo "fail";
        exit;
    }
}mysqli_close($con);

?>