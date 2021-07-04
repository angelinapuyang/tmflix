<?php
session_start();
include('includes/adminheader.php');
?>

<!-- start of floating side navbar-->
<nav class="navbar">

<ul>

<li>
    <a href="#actor" class="dot" data-scroll="actor">
      <span>ADD ACTOR</span>
    </a>
  </li>

  <li>
    <a href="#table-actor" class="dot" data-scroll="table-actor">
      <span>VIEW ACTOR</span>
    </a>
  </li>



</ul>
</nav>
<!-- end of floating side navbar-->

<!-- 8) start of section add actor-->
<section class="sec" id="actor">
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
                    <h4 class="card-title text-black-50">Select actor for each series</h4>
                </div>
                    <div class="card-body">

                        <!--start of form-->
                        <form action="insertactor.php" method="POST">
                            <div class="row">
                                <div clas=col-md-2>
                                    <label>Your series ID</label>
                                    <input type="text" name="series_id" class="form-control">
                                </div>

                                    <div class="col-md-6">
                                        <label for="">Actor</label>
                                        <select name="actors[]"  class="form-control multiple-select" multiple>
                                            <?php
                                            $con = mysqli_connect("localhost", "root", "", "tmflix");
                                            $query = "SELECT * FROM actor";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rowact)
                                                {
                                                    ?>
                                                    <option value=" <?php echo $rowact ['actor_id']; ?> ">
                                                        <?php echo $rowact ['actor_first_name'] ; ?>
                                                        <?php echo $rowact ['actor_last_name'] ; ?>
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
                                            <button type="submit" name="save-multiple-actor" class="btn btn-success btn-block">Save</button>
                                        </div>

                            </div>
                            </form> <!--end of form-->
                    </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- 9) start of section table actor-->
<section class="sec" id="table-actor">

<!--START OF SHOW TABLE ACTOR ######################################################################################################################-->
<br> <br>
<div class="container">
    <div class="jumbotron">
        <div class="card "> 
             <h3>List of TV Series with actor</h3>
        </div>
            <div class="card-button-add">
                <div class="card">
                    <div class="card-body">
                           
                                <!-- start of table genre-->
                                <table id="datatable2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>   Series ID    </td>
                                            <td>   Series Title </td>
                                            <td>   Actor        </td>
                                            <td>   Actor        </td>
                                            <td>   Edit         </td>
                                            <td>   Delete       </td>
                                        </tr> 
                                    </thead>
                                        <tbody>
                                        <?php
                                        $connection=mysqli_connect("localhost", "root", "", "tmflix");

                                        $sql = "SELECT series.series_id, series.series_title, actor.actor_first_name, 
                                        actor.actor_last_name
                                        FROM series 
                                        INNER JOIN series_actor ON series.series_id=series_actor.series_id
                                        INNER JOIN actor ON series_actor.actor_id=actor.actor_id";

                                        $query_run=mysqli_query($connection, $sql);
                                        if($sql != "zero")
                                        {
                                            while($row = mysqli_fetch_assoc($query_run))
                                            {
                                        ?>
                                                <tr>
                                                    <td> <?php echo $row['series_id']; ?>     </td>
                                                    <td> <?php echo $row['series_title']; ?>  </td>
                                                    <td> <?php echo $row['actor_first_name']; ?>           </td>
                                                    <td> <?php echo $row['actor_last_name']; ?>           </td>
                                                    <td>
                                                    <form action="actor_edit.php" method="POST">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['series_title']; ?>">
                                                        <button type="submit" name="edit_actor" class="btn btn-primary" >Edit</button>
                                                    </form>
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            echo $result;
                                        }
                                        ?>
                                        <tbody>
                                </table>
                                <!-- end of table genre-->
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<br><br><br><br><br>
<hr>
<!--END OF TABLE ACTOR  ###########################################################################################################################-->


</section>



<?php include('includes/adminfooter.php') ?>