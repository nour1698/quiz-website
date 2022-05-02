<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once './vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('893961790339-7gai97ftbun9ampcsqp32pjqkvt7vup6.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/quiz-website/google.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>