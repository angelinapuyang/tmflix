<?php
session_start();
include('includes/adminheader.php');
?>

<!-- start of floating side navbar-->
<nav class="navbar">

<ul>
<li>
  <a href="#genre" class="dot" data-scroll="genre">
      <span>ADD GENRE</span>
    </a>
  </li>

  <li>
    <a href="#table-genre" class="dot" data-scroll="table-genre">
      <span>VIEW GENRE</span>
    </a>
  </li>
  </ul>

</nav>
<!-- end of floating side navbar-->

<!-- 4) start of section genre-->

<br>
<br>
<!--START OF ADDING GENRE  ###########################################################################################################################-->

<div class="container">
    <h2>GENRE</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header bg-light">
                        <!-- calling PHP SESSION for successful input-->
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
                            <h4 class="card-title text-black-50">Select genre for each series</h4>
                    </div>
                        
                        <!--start of container to add genre-->
                        <div class="card-body">
                            <form action="insertgenre.php" method="POST">
                                <div class="row">
                                    <div clas=col-md-2>
                                        <label>Your series ID</label>
                                        <input type="text" name="series_id" class="form-control">
                                    </div>
                                        
                                        <div class="col-md-6">
                                            <label for="">Genre</label>
                                            <select name="genres[]"  class="form-control multiple-select" multiple>
                                                <?php
                                                $con = mysqli_connect("localhost", "root", "", "tmflix");
                                                $query = "SELECT * FROM genre";
                                                $query_run = mysqli_query($con, $query);
                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $rowgen)
                                                    {
                                                ?>
                                                        <option value=" 
                                                            <?php echo $rowgen ['genre_id']; ?> ">
                                                            <?php echo $rowgen ['genre'] ; ?>
                                                        </option>
                                                <?php
                                                    }
                                                } 
                                                else
                                                {   
                                                ?>
                                                    <option value="">No Record Found</option> 
                                                <?php
                                                }
                                                ?> 
                                            </select>
                                        </div>
                                </div> <br>
                                         <!--SAVE button for genre is here-->
                                        <div class="container">
                                            <div class="col-md-3">
                                                <button type="submit" name="save-multiple" class="btn btn-success btn-block">Save</button></div>
                                            </div>
                                        </div>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
</div>

</section>

<!-- 5) start of section table genre-->
<section class="sec" id="table-genre">
<!--START OF SHOW TABLE GENRE ######################################################################################################################-->
<br> <br>
<div class="container">
    <div class="jumbotron">
        <div class="card "> 
             <h3>List of TV Series with genre</h3>
        </div>
            <div class="card-button-add">
                <div class="card">
                    <div class="card-body">
                           
                                <!-- start of table genre-->
                                <table id="datatable1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>   Series ID    </td>
                                            <td>   Series Title </td>
                                            <td>   Genre        </td>
                                            <td>   Edit         </td>
                                            <td>   Delete       </td>
                                        </tr> 
                                    </thead>
                                        <tbody>
                                        <?php
                                        $connection=mysqli_connect("localhost", "root", "", "tmflix");

                                        $sql = "SELECT series.series_id, series.series_title, genre.genre
                                        FROM series 
                                        INNER JOIN series_genre ON series.series_id=series_genre.series_id
                                        INNER JOIN genre ON series_genre.genre_id=genre.genre_id";

                                        $query_run=mysqli_query($connection, $sql);
                                        if($sql != "zero")
                                        {
                                            while($row = mysqli_fetch_assoc($query_run))
                                            {
                                        ?>
                                                <tr>
                                                    <td> <?php echo $row['series_id']; ?>     </td>
                                                    <td> <?php echo $row['series_title']; ?>  </td>
                                                    <td> <?php echo $row['genre']; ?>           </td>
                                                    <td>
                                                    <form action="genre_edit.php" method="POST">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['series_id']; ?>">
                                                        <button type="submit" name="edit_genre" class="btn btn-primary" >Edit</button>
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
<!--END OF TABLE GENRE  ###########################################################################################################################-->


</section>
<?php include('includes/adminfooter.php') ?>