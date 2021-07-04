<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tmflix");

//Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    if(isset($_POST['insertdata']) )
    {
                    //to add a new tv series title, description and released year
                    $series_title = $_POST['series_title'];
                    $series_description = $_POST['series_description'];
                    $release_year = $_POST['release_year'];
                    $maturity_rating = $_POST['maturity_rating'];

                   //to upload new image
                    $filename = addslashes($_FILES['series_img']['name']);
                    $tmpname = addslashes(file_get_contents($_FILES['series_img']['tmp_name']));
                    $filetype = addslashes($_FILES['series_img']['type']);
                    $filesize = addslashes($_FILES['series_img']['size']);
                    $array = array('jpg','jpeg','png', 'PNG', 'JPG', 'JPEG'); //valid extensions
                    $ext = pathinfo($filename, PATHINFO_EXTENSION); //get image extension
                    if(!empty($filename)){
                    if(in_array($ext, $array)){
       
                    // Insert content into database 
                    $query = "INSERT INTO series (`series_title`, `series_description`, `release_year`, `name`, `series_img`, `maturity_rating`) 
                    VALUES ('$series_title', '$series_description', '$release_year', '$filename','$tmpname', '$maturity_rating') ";

                    $query_run = mysqli_query($con, $query);

                    $_SESSION['status'] = "TV Series inserted successfully.";
                    header("Location: index.php"); 
                    exit;
                        }
                        else{
                        echo "failed";
                        header("Location: index.php"); 
                        exit;
                        }
                        }

                }    mysqli_close($con);
                
?>

