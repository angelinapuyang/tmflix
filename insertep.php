<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

//Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['save-episode']))
{
    $season_id = $_POST['season_id'];
    $ep_number = $_POST['ep_number'];
    $ep_duration = $_POST['ep_duration'];
    $ep_title = $_POST['ep_title'];
    $ep_description = $_POST['ep_description'];

    $query = "INSERT INTO episode (`season_id`, `ep_number`, `ep_duration`, `ep_title`, `ep_description`) 
    VALUES ('$season_id', '$ep_number', '$ep_duration', '$ep_title', '$ep_description') ";

    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Episode inserted successfully.";
        header("Location: season_ep.php"); 
        exit;
    } 
    else
    {
        echo '<script> alert("ERROR: Episode failed to add"); </script>';
        exit;
    }
}mysqli_close($con);

?>
