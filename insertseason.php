<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

//Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['save-season']))
{
    $series_id = $_POST['series_id'];
    $season_number = $_POST['season_number'];

    $query = "INSERT INTO season (`series_id`, `season_number`) 
    VALUES ('$series_id', '$season_number') ";

    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Season inserted successfully.";
        header("Location: season_ep.php"); 
        exit;

    } 
    else
    {
        header("Location: season_ep.php"); 
        echo "fail";
        exit;
    }
}mysqli_close($con);

?>