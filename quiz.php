<?php

$success = '<p id="thankyou">Thank you! We&#39;ll be in touch soon.</p>';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function spamcheck($field) {
 //filter_var() sanitizes the e-mail
 //address using FILTER_SANITIZE_EMAIL
 $field=filter_var($field, FILTER_SANITIZE_EMAIL);

 //filter_var() validates the e-mail
 //using FILTER_VALIDATE_EMAIL
 if(filter_var($field, FILTER_VALIDATE_EMAIL)) { return TRUE; }
 else { return FALSE; }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (isset($_REQUEST['email'])) {

  //if "email" is filled out, proceed
  //check if the email address is invalid
  //if not, then display error message
  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE) { $emailErr = "Please enter a valid email address."; }
 }

 if (empty($_POST["email"])) {
  $emailErr = "Please enter your email address.";
 } else {
  $email = test_input($_POST["email"]);
 }

 if (empty($_POST["experience"])) {
  $experienceErr = "This question is required.";
 } else {
  $experience = test_input($_POST["experience"]);
 }

 if (empty($_POST["allcaps"])) {
  $allcapsErr = "REQUIRED";
 } else {
  $allcaps = test_input($_POST["allcaps"]);
 }

 if (empty($_POST["project"])) {
  $projectErr = "This question is required.";
 } else {
  $project = test_input($_POST["project"]);
 }

 if (empty($_POST["kcups"])) {
  $kcupsErr = "This question is required.";
 } else {
  $kcups = test_input($_POST["kcups"]);
 }

 if (empty($_POST["reflect"])) {
  $reflectErr = "This question is required.";
 } else {
   $reflect = test_input($_POST["reflect"]);
 }

 // If all values exist, send the email
 if ( $email && $experience && $allcaps && $project && $kcups && $reflect ) {

  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $experience = $_REQUEST['experience'] ;
  $allcaps = $_REQUEST['allcaps'] ;
  $project = $_REQUEST['project'] ;
  $kcups = $_REQUEST['kcups'] ;
  $reflect = $_REQUEST['reflect'] ;
  $description = $_REQUEST['description'] ;

  mail("erica@ericadreisbach.com", "web design/development", "Experience: $experience   All caps: $allcaps    Project priorities: $project   K-cups: $kcups       Reflects poorly on: $reflect    $description", "From: $name <$email>");

  echo "<script type='text/javascript'> $(window).load(function(){ $('.form').css('display','none'); $('#submit').css('display','none'); }); </script>";
  echo $success;
 }
}

?>
