<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

if(isset($_POST['save-multiple-actor']))
{
    $series_id = $_POST['series_id'];
    $actors = $_POST['actors'];

    foreach($actors as $rowact)
    {
        //echo $hobrow
        $query = "INSERT INTO series_actor (series_id, actor_id) VALUES ('$series_id', '$rowact') ";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Actor inserted successfully.";
        header("Location: actor.php"); 
        exit;

    } 
    else
    {
        header("Location: actor.php"); 
        exit;
    }
}mysqli_close($con);

?>