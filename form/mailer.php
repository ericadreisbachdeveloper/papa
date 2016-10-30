
<?php
    $to = "rockygulliver@mail.com";
    $from = "daemon@ericadreisbach.com";
    $name = "mailer daemon";
    $headers = "From:$name<$from>";
    $subject = "web development project";
    /* $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"website"} = "website";
    $fields{"message"} = "message"; */
    $body = 'Name : ' . _$REQUEST["name"] . '
' . 'Email: ' . _$REQUEST["email"] . '
' . 'Website: ' . $_REQUEST["website"] . '

' . $_REQUEST["message"];
    $send = mail($to, $subject, $body, $headers);
?>
