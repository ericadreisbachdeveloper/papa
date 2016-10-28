<?php
// process.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required.';
    }

    if (empty($_POST['email'])) {
      $errors['email'] = 'Email is required.';
    }

    if (empty($_POST["clientproject"])) {
        $errors['clientproject'] = 'Say a little something about your project. Do you need a new site? <br />Perhaps a redesign of an existing site?';
    }


    if ( ! empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;

    } else {

        $data['success'] = true;
        $data['message'] = 'Success!';

        // If all required values exist, send the email
        $name = $_REQUEST['name'] ;
        $email = $_REQUEST['email'] ;
        $website = $_REQUEST['website'] ;
        /* $searchterms = $_REQUEST['searchterms'] ; */
        $clientproject = $_REQUEST['clientproject'] ;

        $message = 'From: ' . $name . ' ' . $email . ' ' . ' ' . $website . '

       ';
        $message = 'Search terms: ' . $searchterms . '

       ';
        $message .= $clientproject;

        mail('erica@ericadreisbach.com', 'web design/development', $message, 'From:' . $name . '<' . $email . '>');
    }

    echo json_encode($data);

?>
