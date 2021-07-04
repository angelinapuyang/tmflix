<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="register.css" />
    <title></title>   
</head>

<body>
<?php
// define variables and set to empty values
$firstName = $lastName = $emailAddress = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = test_input($_POST["firstName"]);
  $lastName = test_input($_POST["lastName"]);
  $emailAddress = test_input($_POST["emailAddress"]); 
  $password = test_input($_POST["password"]);
}

// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailAddressErr = $passwordErr = "";
$firstName = $lastName = $emailAddress = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
      $firstNameErr = "Name is required";
    } else 
    if (!preg_match("/^([A-Z]){1}([a-z]){1,}$/", $_POST["firstName"])) {
      $firstName = test_input($_POST["firstName"]);
    } else {
      $firtNameErr = "First letter MUST BE AN UPPERCASE!";
    }
  
    if (empty($_POST["lastName"])) {
      $lastNameErr = "Name is required";
    } else 
    if (!preg_match("/^([A-Z]){1}([a-z]){1,}$/",$_POST["lastName"])) {
      $lastName = test_input($_POST["lastName"]);
    } else {
      $lastNameErr = "First letter MUST BE AN UPPERCASE!";
    }

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

        <div id="details-section">
            <form name="registration"  method="post">
            <div class="row">
                <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" required>
            </div>

            <div class="row">
                <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" required>
            </div>

            <div class="row">
                <input type="text" placeholder="Enter Email" name="emailAddress" id="emailAddress" required>
            </div>

            <div class="row">
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
            </div>
        </div>

        <button type="submit">Sign Up</button>

        <div class="container signin">
            <p><a href="#">Forgot Password</a>| Have an account? <a href="tmflix.html">Sign in here</a></p>
        </div>
    </div>
</body>
