<?php

// define variables and set to empty values
$name = $email = $website = $clientproject = "";
$nameErrCode = $emailErrCode = "";
$nameErr = $emailErr = $websiteErr = $clientprojectErr = "";
$success = '<p id="thankyou">Thank you! <br /><br />&smile;</p><img src="img/old-phone.jpg" id="thankyouphone" class="img" alt="phone image courtesy Pixabay user Gellinger | erica dreisbach | freelance Chicago web developer" title="phone image courtesy Pixabay user Gellinger | erica dreisbach | freelance Chicago web developer" />';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function spamcheck($field) {
 $field=filter_var($field, FILTER_SANITIZE_EMAIL);

 if(filter_var($field, FILTER_VALIDATE_EMAIL)) { return TRUE; }
 else { return FALSE; }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (isset($_REQUEST['email'])) {

   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $emailErrCode = 'errorinput';
   } else {
    $email = test_input($_POST['email']);
   }

  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE) {
    $emailErr = "Please enter a valid email address";
    $emailErrCode = 'errorinput';
  }
 }


 if (empty($_POST["name"])) {
  $nameErr = "Name is required";
  $nameErrCode = 'errorinput';
 } else {
  $name = test_input($_POST["name"]);
 }


 if (empty($_POST["website"])) {
   $website = "";
 } else {
   $website = test_input($_POST["website"]);
   // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
   if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
     $websiteErrCode = 'errorinput';
     $websiteErr = "Enter complete URL in the form http://www.website.com";
   }
 }



 if (empty($_POST["clientproject"])) {
  $clientprojectErr = "";
 } else {
  $clientproject = test_input($_POST["clientproject"]);
 }


 // If all required values exist, send the email
 if ( $name && $email && $clientproject ) {

  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $website = $_REQUEST['website'] ;
  $clientproject = $_REQUEST['clientproject'] ;

  $message = 'From: ' . $name . ' ' . $email . ' ' . ' ' . $website . '

';
  $message .= $clientproject;


  mail('erica@ericadreisbach.com', 'web design/development', $message, 'From:' . $name . '<' . $email . '>');

  echo "<style type='text/css'>.contact-section>.container>.row>.col-content>.-successhide{display: none;}</style>";
  echo $success;
 }
}

?>
