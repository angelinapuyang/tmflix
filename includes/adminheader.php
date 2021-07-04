<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
    <title>TMFlix</title>
    
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/styles.css">

</head>

<body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-tv nav__icon' style='color:#e50914' ></i>
                        <img src="img/tmflix.png" alt="tmflixlogo" width="150" height="50"/>
                    </a>

                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                            <i class='bx bx-upload nav__icon' ></i>
                            <span class="nav__name">Upload New</span>
                        </a>

                        <a href="season_ep.php" class="nav__link">
                            <i class='bx bxs-edit nav__icon'   ></i>
                            <span class="nav__name">Episode & Season</span>
                        </a>
                        
                       <a href="genre_page.php" class="nav__link ">
                            <i class='bx bx-add-to-queue nav__icon'></i>
                            <span class="nav__name">Genre</span>
                        </a>

                        <a href="actor_page.php" class="nav__link">
                        <i class='bx bxs-user-plus nav__icon'></i>
                            <span class="nav__name">Actor</span>
                        </a>

                        <a href="director_page.php" class="nav__link">
                        <i class='bx bxs-user-plus nav__icon'></i>
                            <span class="nav__name">Director</span>
                        </a>

                        <a href="award_page.php" class="nav__link">
                        <i class='bx bx-award' ></i>
                            <span class="nav__name">Award</span>
                        </a>

                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>