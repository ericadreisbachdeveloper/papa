<?php

// define variables and set to empty values
$name = $email = $website = $experience = $allcaps = $clientproject = "";
$nameErrCode = $emailErrCode = "";
$nameErr = $emailErr = $websiteErr = $experienceErr = $allcapsErr = $clientprojectErr = "";
$success = '<p id="thankyou">Thank you! I&#39;ll be in touch&nbsp;soon. <br /><br />&smile;</p><img src="img/old-phone.jpg" class="thankyou-phone" alt="phone image courtesy Pixabay user Gellinger | erica dreisbach | freelance Chicago web developer" title="phone image courtesy Pixabay user Gellinger | erica dreisbach | freelance Chicago web developer" />';

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
     $websiteErr = "Enter complete URL in the form http://www.website.com";
   }
 }

 if (empty($_POST["experience"])) {
  $experienceErr = "This question is required";
 } else {
  $experience = test_input($_POST["experience"]);
 }

 if (empty($_POST["allcaps"])) {
  $allcapsErr = "THIS QUESTION IS REQUIRED";
 } else {
  $allcaps = test_input($_POST["allcaps"]);
 }

 if (empty($_POST["clientproject"])) {
  $clientprojectErr = "";
 } else {
  $clientproject = test_input($_POST["clientproject"]);
 }

 if( isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']) {
     $query = getSeQuery($_SERVER['HTTP_REFERER']);
     echo $query;
 } else {
     echo "I think they spelled REFERER wrong? Anyways, your browser says you don't have one.";
 }



 function getSeQuery($url = false) {
     $segments = parse_url($url);
     $keywords = null;
     if($query = isset($segments['query']) ? $segments['query'] : (isset($segments['fragment']) ? $segments['fragment'] : null)) {
     parse_str($query, $segments);
     $keywords = isset($segments['q']) ? $segments['q'] : (isset($segments['p']) ? $segments['p'] : null);
     }
     return $keywords;
 }


 // If all required values exist, send the email
 if ( $name && $email && $experience && $allcaps ) {

  $name = $_REQUEST['name'] ;
  $email = $_REQUEST['email'] ;
  $website = $_REQUEST['website'] ;
  $experience = $_REQUEST['experience'] ;
  $allcaps = $_REQUEST['allcaps'] ;
  $clientproject = $_REQUEST['clientproject'] ;

  $message = 'From: ' . $name . ' ' . $email . '

';
  $message .= 'Prior experience was: ' . $experience . '
';
  $message .= 'All caps emails are ok: ' . $allcaps . '

';
  $message .= 'Keywords: ' . $keywords . '
';
  $message .= $clientproject;


  mail('erica@ericadreisbach.com', 'web design/development', $message, 'From:' . $name . '<' . $email . '>');

  echo "<style type='text/css'>#contact>.wrapper>.-successhide{display: none;}</style>";
  echo $success;
 }
}

?>
