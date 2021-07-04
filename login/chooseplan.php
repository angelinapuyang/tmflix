<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="chooseplan.css" />
    <title></title>   
</head>
<body>
<?php
    //empty array by default
    $checked = array();
    //If the POST variable “checked” is a valid array.
    If(!empty($_POST[‘checked’]) && is_array($_POST[‘checked’])){
    //Loop through the array of checkbox values.
    Foreach($_POST[‘checked’] as $checked){
    //Make sure that this option is a valid one.
    If(in_array($checked){
    //Add the selected options to our $checked array.
    $checked[]=$checked;
    
    ?>


<h1><b>TMFLIX</b></h1>

<h2>Step 2: Choose the plan that's right for you</h2>
<ul>
    <li><p>Watch all you want. Ad Free.</p></li>
    <li><p>Change or cancel your plan anytime.</p></li>
</ul>

<label class="container">30 DAYS FREE TRIAL
    <input type="checkbox" name="checked[]">
    <span class="checkmark"></span>
</label>
<ul>
    <li><p>Monthly pricing | RM0</p></li>
    <li><p>Watch TMFlix for free in 30 days</p></li>
</ul>

<label class="container">1 DEVICE VIEWING
    <input type="checkbox" name="checked[]">
    <span class="checkmark"></span>
</label>
<ul>
    <li><p>Monthly pricing | RM17</p></li>
    <li><p>Resolution | 1080p</p></li>
</ul>

<label class="container">MULTIPLE DEVICE VIEWING
    <input type="checkbox" name="checked[]">
    <span class="checkmark"></span>
</label>
<ul>
    <li><p>Monthly pricing | RM39</p></li>
    <li><p>Resolution | 1080p</p></li>
</ul>

<button type="submit">Choose plan</button>
</body>