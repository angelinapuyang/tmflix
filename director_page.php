<?php
session_start();
include('includes/adminheader.php');
?>


<!-- start of floating side navbar-->
<nav class="navbar">

<ul>
<li>
    <a href="#director" class="dot" data-scroll="director">
      <span>ADD DIRECTOR</span>
    </a>
  </li>

  <li>
    <a href="#table-director" class="dot" data-scroll="table-director">
      <span>VIEW DIRECTOR</span>
    </a>
  </li>

 </ul>

</nav>
<!-- end of floating side navbar-->


<!-- 6) start of section add directors-->
<section class="sec" id="director">

</section>

<!-- 7) start of section table director-->
<section class="sec" id="table-director"></section>



<?php include('includes/adminfooter.php') ?>