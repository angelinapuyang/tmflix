<?php
$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, 'tmflix');

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    if(isset($_POST['editdata']))
    {
        $series_id = $_POST['update_series_id'];
        $series_title = $_POST['series_title'];
        $series_description = $_POST['series_description'];
        $release_year = $_POST['release_year'];
        $maturity_rating = $_POST['maturity_rating'];


                $query = "UPDATE series SET series_title='$series_title', series_description='$series_description', 
                release_year='$release_year' , maturity_rating='$maturity_rating'
                WHERE series_id='$series_id' ";

                $query_run =mysqli_query($con, $query);

                if($query_run )
                {
                    echo "Records updated successfully.";
                    header("Location: index.php");
                } 
                else 
                {
                    echo "ERROR: Records failed to update.";
                }
            
            }
    

    // Close connection
    mysqli_close($con);
?>

