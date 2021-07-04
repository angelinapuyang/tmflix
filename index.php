<?php
session_start();
include('includes/adminheader.php');
?>

<div class="modal fade" id="TVAddModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add TV Series Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="insertTV_series.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    
                    <!-- ADD TV TITLE-->
                    <div class="col-12">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="series_title">
                    </div>

                    <!-- ADD TV DESCRIPTION-->
                    <div class="col-12">
                        <label for="inputDesc" class="form-label">Description</label>
                        <input type="text" class="form-control"  name="series_description">
                    </div>

                    <!-- ADD TV RELEASED YEAR-->
                    <div class="col-md-6">
                        <label for="inputRY" class="form-label">Released Year</label>
                        <input type="text" class="form-control" name="release_year">
                    </div>

<!--START OF ADD IMAGE POP UP MODAL####################################################################################################-->
                    <div>
                        <label for="inputRY" class="form-label">Select Image File</label>
                        <input type="file" class="form-control" name="series_img" id="series_img" value="Upload" accept="image/png, .jpeg, .jpg, image/gif" >
                    </div>   <br>

                    <div>
                        <label for="inputMR" class="form-label">Please select maturity rating: </label>
                            <select name="maturity_rating">
                                  <option>---Maturity Rating---</option>
                                  <option value="13+">13+</option>
                                  <option value="16+">16+</option>
                                  <option value="18+">18+</option>
                            </select>
                      </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                </div>
                
      </form>
    </div>
  </div>
</div>
</div>

<!-- END OF ADD NEW TV SERIES POP UP MODAL (BOOTSTRAP) ##########################################################################################################################################-->

<!-- START OF EDIT POP UP FORM (BOOTSTRAP MODAL) ##########################################################################################################################################-->

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT TV Series Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="editTVseries.php" method="POST"  encypte="multipart/form-data" >
            <div class="modal-body">

                    <!-- EDIT TV TITLE-->
                    <input type="hidden" name="update_series_id" id="update_series_id">
                    <div class="col-12">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="series_title" name="series_title">
                    </div>

                    <!-- EDIT TV DESCRIPTION-->
                    <div class="col-12">
                        <label for="inputDesc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="series_description" name="series_description"> 
                    </div>
                    
                    <!-- EDIT TV RELEASED YEAR-->
                    <div class="col-md-6">
                        <label for="inputRY" class="form-label">Released Year</label>
                        <input type="text" class="form-control" id="release_year" name="release_year">
                    </div> <br>
                    
                    <!-- EDIT MATURITY RATING-->
                    <div>
                        <label for="inputMR" class="form-label">Please select maturity rating: </label>
                            <select name="maturity_rating" id="maturity_rating">
                                  <option>---Maturity Rating---</option>
                                  <option value="13+">13+</option>
                                  <option value="16+">16+</option>
                                  <option value="18+">18+</option>
                            </select>
                      </div>
                    
            </div>

                <!-- BUTTON TO CLOSE & UPDATE DATA IN POP UP MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="editdata" class="btn btn-primary">Update Data</button>
                </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

<!-- END OF EDIT TV SERIES POP UP ################################################################################################################# -->

<!-- START OF DELETE TV SERIESPOP UP FORM (BOOTSTRAP MODAL) ##########################################################################################################################################-->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE TV Series Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="deleteTVseries.php" method="POST" >
            
            <div class="modal-body">
                    <input type="hidden" name="delete_series_id" id="delete_series_id">
                      <h5>Uh oh! Are you sure you want to delete this data?</h5> 
            </div>

             <!-- BUTTON TO CANCEL OR DELETE DATA SELECTED -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="deletedata" class="btn btn-danger">YES, delete it.</button>
                </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- END OF DELETE TV SERIES POP UP ################################################################################################################# -->

<!-- START OF  TABLE TO VIEW/FETCH DATA ########################################################################################################### -->
  <h3>List of added TV Series</h3>

            </div>
                <div class="card-button-add">
                <br>
                <button type="button" class="btn btn-success btn-lg float-none badge rounded-pill" data-bs-toggle="modal" data-bs-target="#TVAddModel"
                style="width:200px; height:50px;" >ADD NEW TV SERIES </button>
                    <div class="card-body">
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
                    
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">

                        <!--start of table-->
                        <table class="table table-light table-bordered table-hover" id="datatable2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Poster</th>
                                    <th scope="col">Series Title</th>
                                    <th scope="col">Series Decription</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Maturity Rating</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                $con=mysqli_connect("localhost", "root", "", "tmflix");


                                $query= "SELECT * FROM series";
                                $query_run=mysqli_query($con, $query);
                           
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                ?>
                                        <tr>
                                            <td scope="row"> <?php echo $row['series_id'];?>  </td> 
                                                <td>
                                                <?php echo '<img src="data:image;base64,'.base64_encode($row['series_img']).'" alt="series_img"  
                                                        style="width: 130px; height: 200px;" >'?>      
                                                </td>
                                                <td> <?php echo $row['series_title']; ?>      </td>
                                                <td> <?php echo $row['series_description']; ?>       </td>
                                                <td> <?php echo $row['release_year']; ?> </td>
                                                <td> <?php echo $row['maturity_rating']; ?>     </td>
                                                <!--<td> <?php echo $row['name']; ?></td>-->

                                                <form action="view_series.php?id=<?php echo $series_id; ?>" method="POST">
                                                    <td>
                                                    <button type="submit" class="btn btn-info badge rounded-pill" style="width:80px; height:25px;">View</button>
                                                    </td>
                                                </form>
                                                <td>
                                                <button type="button" class="btn btn-primary editbtn badge rounded-pill" style="width:80px; height:25px;">Edit</button>
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-danger deletebtn badge rounded-pill" style="width:80px; height:25px;">Delete</button>
                                                </td>
                                        </tr>  
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
    
                                ?>                                    
                                </tbody>
                                   
                            </table>
                            <br>
                    </div>
                </div>
        </div>

    </div>
 
 <!-- END OF  TABLE TO VIEW/FETCH DATA ########################################################################################################### -->  
 <?php include('includes/adminfooter.php') ?>