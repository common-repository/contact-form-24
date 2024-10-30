<?php

$name = $_POST['name'];
$email = $_POST['email']; 
$web = $_POST['web']; 
$body = $_POST['text']; 
$receiver = $_POST['your_email'];
if (!empty($name) & !empty($email) && !empty($body)) {
    $body = "Name:{$name}\n\nWebsite :{$web}\n\nComments:{$body}";
	$send = mail($receiver, 'Contact Form Submission', $body, "From: {$email}");
    if ($send) {
        echo 'true'; //if everything is ok,always return true , else ajax submission won't work
    }

}

?>