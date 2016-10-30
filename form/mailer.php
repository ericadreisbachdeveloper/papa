
<?php
    $to = "rockygulliver@mail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From:$name<$from>";
    $subject = "web development project";
    $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"website"} = "website";
    $fields{"message"} = "message";
    $body = "Website: " . $_REQUEST['website'] . '

    ' . $_REQUEST['message'];
    $send = mail($to, $subject, $body, $headers);
?>
