<?php
session_start();
include('includes/adminheader.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header bg-primary">
                <?php
                                    if(isset($_SESSION['status']))
                                    {
                                        ?>
                                        
                                        <div class="alert alert-success" role="alert">
                                        <?php echo $_SESSION['status']; ?>
                                      </div>
                                      <?php
                                        
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                    <h4 class="card-title text-white">EDIT genre for each series</h4>
                </div>
                    <div class="card-body">
                        <?php
                        $con=mysqli_connect("localhost", "root", "", "tmflix");
                        if(isset($_POST['edit_genre']))
                        {
                            $series_id=$_POST['edit_id'];

                            $query = "SELECT * FROM series WHERE series_id='$series_id' ";
	                        $query_run = mysqli_query($con, $query);
                            
                            foreach($query_run as $rowediting)
                            {
                                ?>

                                <form action ="insertgenre.php" method="POST" entype="multipart/form-data">
                                    <input type="hidden" name="updateing_id" value="<?php echo $rowediting['series_id'] ?>">

                                    <?php
                                    $genres = "SELECT * FROM genre";
                                    $gen_run = mysqli_query($con, $genres);

                                    if(mysqli_num_rows($gen_run) > 0)
                                    {
                                        ?> 
                                        <div class="form-group">
                                            <label> Genre </label>
                                            <select name="genre_id" class="form-control">
                                                <option value=""> </option>
                                                    <?php
                                                    foreach($gen_run as $row)
                                                    {
                                                    ?>
                                                        <option value="<?php echo $row['genre_id']; ?>">
                                                            <?php echo $row['genre']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    else {
                                        echo "No data available";
                                    }

                                ?>

                            <fieldset disabled> 
                                <div clas=col-md-2>
                                    <label for="disabledTextInput">Your series ID</label>
                                    <input type="text" id="disabledTextInput" name="series_id" class="form-control" value="<?php echo $rowediting['series_id']; ?>" >
                                </div>
                            </fieldset>


                                    <br>
                                    <br>
                                    <a href="genre.php" class="btn btn-secondary">CANCEL</a>
                                    <button type="submit" name="genre_update" class="btn btn-primary"> Update</button>
                                </form>
                        <?php
                            }
                        }
                        ?>
</div>



<?php include('includes/adminfooter.php') ?>