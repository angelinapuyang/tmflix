<?php
session_start();
include('includes/adminheader.php');
include('includes/adminheader.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-light">
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
                    <h4 class="card-title text-black-50">Select director for each series</h4>
                </div>
                    <div class="card-body">

                        <!--start of form-->
                        <form action="insertdirector.php" method="POST">
                            <div class="row">
                                <div clas=col-md-2>
                                    <label>Your series ID</label>
                                    <input type="text" name="series_id" class="form-control">
                                </div>

                                    <div class="col-md-6">
                                        <label for="">Director</label>
                                        <select name="directors[]"  class="form-control multiple-select" multiple>
                                            <?php
                                            $con = mysqli_connect("localhost", "root", "", "tmflix");
                                            $query = "SELECT * FROM director";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rowdir)
                                                {
                                                    ?>
                                                    <option value=" <?php echo $rowdir ['dir_id']; ?> ">
                                                        <?php echo $rowdir ['dir_first_name'] ; ?>
                                                        <?php echo $rowdir ['dir_last_name'] ; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No Record Found";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    </div>
                                    <br>

                                        <div class="col-md-3">
                                            <label></label>
                                            <button type="submit" name="save-multiple-dir" class="btn btn-success btn-block">Save</button>
                                        </div>

                            </div>
                            </form> <!--end of form-->
                    </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/adminfooter.php') ?>