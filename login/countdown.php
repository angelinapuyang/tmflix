<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main Menu</title>
        <link rel = "stylesheet" type = "text/css" href ="UserMenu.css">

    </head>
    <body>
        <?php
        
            function checkDayLeft($DueDate){
                $DateToday = date('Y-m-d');

                $startDate = strtotime($DateToday);
                //$startDate = strtotime('2021-12-12');
                $EndDate = strtotime($DueDate);
                $DaysLeft = (($EndDate - $startDate)/60/60/24);
                
                return $DaysLeft;
            }
            session_start();        
            include 'DatabaseConn.php';

            $Username = $_SESSION['Username'];  
            
            //Get UserID
            $sqlgetData = "SELECT UserID,  Active, Subscription, SubsDue FROM UserDetails WHERE Username='$Username'";
            $resultgetData = mysqli_query($DBConnect, $sqlgetData);   

            $getResult = mysqli_fetch_assoc($resultgetData);    
            $UserID = $getResult['UserID'];   
            $Active = $getResult['Active']; 
            $Subs = $getResult['Subscription'];
            $Due = $getResult['SubsDue'];
            

            if($Subs == 'Free'){
                
                
                if(checkDayLeft($Due) <= 0){
                    $_SESSION['Username'] = $Username;
                    $_SESSION['UserID'] = $UserID;
                    $_SESSION['Subs'] = $Subs;
                    $_SESSION['Due'] = $Due;  
                    $_SESSION['Issue'] = 'Your Free Trial period has ended.<br>Please subscribe Premium.';
                    header("Location: UpSubs.php");
                }
                else{
                    echo '<h2>-- TRIAL ACCOUNT --</h2>';
                }               
            } 
            else{ //If Subs is Single or Multiple
                if($Active == 'No'){ //Selected, not paid
                    $_SESSION['Username'] = $Username;
                    header("Location: Payment.php");                    
                }
                else if(checkDayLeft($Due) <= 0){  //If Overdue
                    $_SESSION['Username'] = $Username;
                    $_SESSION['UserID'] = $UserID;
                    $_SESSION['Subs'] = $Subs;
                    $_SESSION['Due'] = checkDayLeft($Due);
                    $_SESSION['Issue'] = 'Your subscription is already due. <br>Please renew account.';                    
                    header("Location: UpSubs.php");                    
                }
                else{ //If already pay and still active
                    echo '<h2>-- PREMIUM ACCOUNT --</h2>';
                }

            }
        ?>

        <div class="margin">

        <header class="head">Hi <?php     //Display user's name here using $_SESSION
            echo $Username;

            echo ',<br>Subscription due on '.$Due;        
            echo ' ('.checkDayLeft($Due).' days left).';
            
            $_SESSION['Username'] = $Username;
            $_SESSION['UserID'] = $UserID;
            
            $_SESSION['Subs'] = $Subs;
            $_SESSION['Due'] = $Due;
            $_SESSION['Issue'] = 'Thinking of extending or upgrading subscription?'
            
        ?></header><br><br><br>
        
        <div id="PageListContainer">
            <ul>
                <li><a href="UpSubs.php" class="upgrade">Upgrade subscription</a></li><br><br>
                <li><a href="WatchTV.php" class="watch">Watch TMFlix</a></li><br><br>
                <li><a href="SearchTV.php" class="search">Search TV Series</a></li><br>
            </ul>        
        </div><br> 

        </div> 
        
        <div id="UserMenuBack" class="navi">
            <a href="index.php" class="logout">Logout</a>        
        </div> 

    </body>
</html>
