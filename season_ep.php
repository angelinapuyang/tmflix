<?php
session_start();
include('includes/adminheader.php');
?>

<!-- start of floating side navbar-->
<nav class="navbar">

    <ul>

    <li>
        <a href="#season" class="dot active" data-scroll="season">
        <span>ADD SEASON</span>
        </a>
    </li>

    <li>
        <a href="#episode" class="dot" data-scroll="episode">
        <span>ADD EPISODE</span>
        </a>
    </li>

    <li>
        <a href="#table-season-ep" class="dot" data-scroll="table-season-ep">
        <span>VIEW TABLE OF SEASON & EPISODE</span>
        </a>
    </li>

  </ul>
</nav>
<!-- end of floating side navbar-->
<br><br> <br><br> 

<!-- 1) start of section add season-->
<section class="sec" id="season">
<div class="container" >
<h2>ADD SEASON</h2>
    <div class="row">
        <div class="col-md-12">
        
            <div class="card mt-4">
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
                    <h4 class="card-title text-black-50">Select season for each series</h4>
                </div>
                    <div class="card-body">

                        <!--start of form-->
                        <form action="insertseason.php" method="POST" >
                            <div class="row">
                                <div clas=col-md-6>

                                    <label>Your series ID</label>
                                    <input type="text" name="series_id" class="form-control">
                                    <br>
                                    <div clas=col-md-12>

                                        <label for="">Season Number</label> <br>
                                            <select name="season_number" id="season_number">
                                                <option>---Select Season Number---</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                    </div>
                                    </div>
                                    </div> </br>
                                        <div class="col-md-3">
                                            <label></label>
                                            <button type="submit" name="save-season" class="btn btn-success btn-block">Save</button>
                                        </div>

                        </form> <!--end of form-->
                        </div>
                        </div>
                        
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<br><br> <br><br> <br><br> <br><br> <br><br> <br><br>

<!--END OF ADDING SEASON  ###########################################################################################################################-->
</section> <!-- end of section add season-->

<!-- 2) start of section add episode-->
<section class="sec" id="episode">

<!--START OF ADDING EPISODES #####################################################################################################################-->
<div class="container">
<h2>ADD EPISODE</h2>
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
                    <h4 class="card-title text-black-50">Fill in details of each episode based on series ID</h4>
                </div>

                    <div class="card-body">
                        <!--start of form-->
                        <form action="insertep.php" method="POST"  class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="row">
                                <div class=col-md-6>
                                    <label>Your season ID</label>
                                    <input type="number" class="form-control" name="season_id">
                                </div>

                                    <!--input episode number-->
                                    <div class="col-md-6">
                                        <label for="inputEPN" class="form-label">Episode Number</label>
                                        <input type="number" class="form-control" name="ep_number">
                                    </div>
                                    <br>

                                     <!--input episode duration-->
                                    <div class="col-md-6">
                                        <label for="inputED" class="form-label">Episode Duration</label>
                                        <input type="text" class="form-control" name="ep_duration">
                                    </div>
                                    <br>
                                    <br>

                                    <!--input episode title-->
                                    <div class="col-12">
                                        <label for="inputepDesc" class="form-label">Episode Title</label>
                                        <input type="text" class="form-control"  name="ep_title">
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    
                                    <!--input episode Description-->
                                    <div class="input-group">
                                        <span class="input-group-text">Episode Description</span>
                                        <textarea class="form-control" aria-label="With textarea" name="ep_description"></textarea>
                                    </div>
                                </div>
                           
                                    <div class="col-md-3">
                                        <label></label>
                                        <button type="submit" name="save-episode" class="btn btn-success btn-block">Save</button>
                                    </div>
                            </div>
                        </form> 
                            <!--end of form-->
                            
                    </div>
            </div>
        </div>
    </div>
</div>
<!--END OF ADDING EPISODE #################################################################################################################################################-->
</section>

<br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
<!-- 3) start of section table ep season-->
<section class="sec" id="table-season-ep">
<div class="container">
    <div class="jumbotron">
        <div class="card text-white bg-dark"> 
            <h3>List of TV Series with seasons and episodes</h3>
        </div>
            <div class="card-button-add">
                <div class="card">
                    <div class="card-body">
                        <div class="scroll">

                            <!--start of table-->
                            <table id="datatable2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td>   #                </td>
                                        <td>   Series Title     </td>
                                        <td>   Season ID        </td>
                                        <td>   Season No        </td>
                                        <td>   Ep No            </td>
                                        <td>   Ep Duration      </td>
                                        <td>   Ep Title         </td>
                                        <td>   Ep Description   </td>
                                        <td>   Edit             </td>
                                        <td>   Delete           </td>
                                    </tr> 
                                </thead>
                                    <tbody>
                                        <?php
                                        $con=mysqli_connect("localhost", "root", "", "tmflix");

                                        $sql = "SELECT 
                                        series.series_id, series.series_title, season.season_id, season.season_number, 
                                        episode.ep_number, episode.ep_duration, episode.ep_title, episode.ep_description 
                                        FROM series 
                                        INNER JOIN season ON series.series_id=season.series_id 
                                        INNER JOIN episode ON season.season_id=episode.season_id";

                                        $query_run=mysqli_query($con, $sql);;
                                        if($sql != "zero")
                                        {
                                            while($row = mysqli_fetch_assoc($query_run))
                                            {
                                        ?>
                                                <tr>
                                                    <td> <?php echo $row['series_id']; ?>     </td>
                                                    <td> <?php echo $row['series_title']; ?>  </td>
                                                    <td> <?php echo $row['season_id']; ?>       </td>
                                                    <td> <?php echo $row['season_number']; ?>   </td>
                                                    <td> <?php echo $row['ep_number']; ?>       </td>
                                                    <td> <?php echo $row['ep_duration']; ?>     </td>
                                                    <td> <?php echo $row['ep_title']; ?>        </td>
                                                    <td> <?php echo $row['ep_description']; ?>         </td>
                                                    <td> <input type="button" class="btn btn-primary" value="Edit"></td> 
                                                    <td><button type="button" class="btn btn-danger deletebtn">Delete</button> </td>
                                                </tr>
                                        <?php
                                            }
                                        } else
                                        {
                                            echo $result;
                                        }
                                        ?>
                                    <tbody>
                            </table> 
                            <!--end of table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<hr>
<!--END OF TABLE TO SHOW EPISODES, SEASONS DETAILS  ##################################################################################################-->
</section>

<br>
<br>


<?php include('includes/adminfooter.php') ?>