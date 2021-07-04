<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="usersignin.css" />
    <title></title>   
</head>

<body>
<?php
// define variables and set to empty values
$emailAddress = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $emailAddress = test_input($_POST["emailAddress"]); 
  $password = test_input($_POST["password"]);
}

// define variables and set to empty values
$emailAddressErr = $passwordErr = "";
$emailAddress = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["emailAddress"])) {
      $emailAddressErr = "Email is required";
    } else
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
      $emailAddress = test_input($_POST["emailAddress"]);
    } else {
      $emailAddressErr = "Invalid email format";
    }
    
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else 
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!#$%&'()*+,-.:;<=>?@[\]^_`{|}~])[A-Za-z\d!#$%&'()*+,-.:;<=>?@[\]^_`{|}~]{6,6}$/",$_POST["password"])) {
      $password = test_input($_POST["password"]);
    } else {
      $passwordErr = "Password is invalid";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h1><b>TMFLIX</b></h1>
    <div class="container">
        <h2>Welcome to administration login</h2>
        <p>Use a valid username and password to gain access to the administrator backend</p>

        <div id="details-section">
            <form name="registration"  method="post">
            <div class="row">
                <input type="text" placeholder="Enter Email" name="emailAddress" id="emailAddress" required>
            </div>

            <div class="row">
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
            </div>
        </div>

        <button type="submit">Login</button>

        <div class="container signin">
            <p><a href="#">Forgot Password</a>|<a href="register.html">Login as user?</a></p>
        </div>
    </div>
</body>