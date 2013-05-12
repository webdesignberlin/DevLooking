<?php
   $email = $_POST['email'];
    $from = "Dev Looking <webmaster@dev-looking.me>";
    $to = "<".$email.">";
    $subject = "Somebody want to hire you !!";
    $body = "hey you lucky developer ! somebody want to offer you some great opportunity";

    $host = "ssl://in.mailjet.com";
    $port = "465";
    $username = "48447089a2d9f781a9eae7295d4dbd17";
    $password = "d76f454ea5c7a043d9ced6e6563a9bc0";

    $headers = array ('From' => $from,
        'To' => $to,
        'Subject' => $subject);
    $smtp = Mail::factory('smtp',
        array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

    $mail = $smtp->send($to, $headers, $body);

?>