
<?php
    $to = "rockygulliver@mail.com" ;
    $from = "daemon@ericadreisbach.com" ;
    $headers = "From:mailer<$from>" ;
    $name = $_REQUEST['name'] ;
    $subject = "web development project from $name";
    $email = $_REQUEST['email'] ;
    $website = $_REQUEST['website'] ;
    /*$searchterms = $_REQUEST['searchterms'] ; */
    $message = $_REQUEST['message'] ;
    /* $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"website"} = "website";
    $fields{"message"} = "message"; */
    $body = 'From: ' . $name . ' ' . $email . ' ' . ' ' . $website . '

  ';
    $body .= $message;

    $send = mail($to, $subject, $body, $headers);
?>
