<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

if(isset($_POST['save-multiple']))
{
    $series_id = $_POST['series_id'];
    $genres = $_POST['genres'];

    foreach($genres as $rowgen)
    {
        //echo $hobrow
        $query = "INSERT INTO series_genre (series_id, genre_id) VALUES ('$series_id', '$rowgen') ";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Genre inserted successfully.";
        header("Location: genre.php"); ;
        exit;

    } 
    else
    {
        header("Location: genre.php"); 
        echo "fail";
        exit;
    }
}



if(isset($_POST['genre_update']))
{
	$updateing_id=$_POST['updateing_id'];
	$genre_id = $_POST['genre_id'];

	$query = "UPDATE series_genre SET genre_id='$genre_id' WHERE series_id='$updateing_id' ";
	$query_run = mysqli_query($con, $query);

	if($query_run)
	{
		$_SESSION['success']="Genre is updated successfully.";
		header('Location: genre_edit.php');
	}
	else
	{
		$_SESSION['status'] = "Genre fail to update.";
		header('Location: genre_edit.php');
	}
}
mysqli_close($con);
?>