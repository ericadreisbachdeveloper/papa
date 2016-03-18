<?php

// define variables and set to empty values
$name = $email = $website = $experience = $allcaps = $clientproject = "";
$nameErr = $emailErr = $websiteErr = $experienceErr = $allcapsErr = $clientprojectErr = "";
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

   if (empty($_POST["email"])) {
    $nameErr = "Name is required";
   } else {
    $name = test_input($_POST['name']);
   }

  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE) { $emailErr = "Please enter a valid email address."; }
 }

 if (empty($_POST["email"])) {
  $emailErr = "Email is required";
 } else {
  $email = test_input($_POST["email"]);
 }

 if (empty($_POST["experience"])) {
  $experienceErr = "This question is required";
 } else {
  $experience = test_input($_POST["experience"]);
 }

 if (empty($_POST["allcaps"])) {
  $allcapsErr = "REQUIRED";
 } else {
  $allcaps = test_input($_POST["allcaps"]);
 }

 if (empty($_POST["project"])) {
  $clientprojectErr = "";
 } else {
  $clientproject = test_input($_POST["clientproject"]);
 }


 // If all values exist, send the email
 if ( $name && $email && $experience && $allcaps && $project ) {

  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $website = $_REQUEST['website'] ;
  $experience = $_REQUEST['experience'] ;
  $allcaps = $_REQUEST['allcaps'] ;
  $project = $_REQUEST['project'] ;

  mail("erica@ericadreisbach.com", "web design/development", "Experience: $experience   All caps: $allcaps    Project priorities: $project   K-cups: $kcups       Reflects poorly on: $reflect        $website          $description", "From: $name <$email>");

  echo "";
  echo $success;
 }
}

?>
