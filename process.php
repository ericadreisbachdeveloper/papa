<?php
$name = $_POST["name"];
$email = $_POST["email"];
$website = $_POST["website"];
$clientproject = $_POST["clientproject"];

$EmailTo = "erica@ericadreisbach.com";
$Subject = "web design/development";

// prepare email body text
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";

$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success){
   echo "success";
} else{
    echo "invalid";
}

?>
