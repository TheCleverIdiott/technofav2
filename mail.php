<?php

$to = "technofav@gmail.com";
$subject = "YOUR SUBJECT HERE";
$body = "YOUR BODY GOES HERE";
$headers = "MIME-Version: 1.0
Content-Type: text/html; charset=UTF-8";
mail ($to, $subject, $body, $headers);

?>