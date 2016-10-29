<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Please fill out the required fields.";
            exit;
        }

        //$name = $_REQUEST['name'] ;
        //$email = $_REQUEST['email'] ;
        //$website = $_REQUEST['website'] ;
        //$searchterms = $_REQUEST['searchterms'] ;
        //$message = $_REQUEST['message'] ;

        $emailbody = 'From: ' . $name . ' ' . $email . '

      ';
        $emailbody .= 'Search terms: ' . $searchterms . '

      ';
        $emailbody .= $message;

        if (mail('erica@ericadreisbach.com', 'web development project', $emailbody, 'From:' . $name . '<' . $email . '>')) {
          http_response_code(200);
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
