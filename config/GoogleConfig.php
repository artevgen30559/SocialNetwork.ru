<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/GoogleAPI/vendor/autoload.php';

$gClient = new Google_Client();
$gClient->setClientId('839005644572-hab1fv46ve5tbtnfgkkefft9asuvehq7.apps.googleusercontent.com');
$gClient->setClientSecret('mxz8X_6nqbWCMjGSqBi7iUI3');
$gClient->setApplicationName('Social Network For College');
$gClient->setRedirectUri('http://socialnetwork/models/G-callback.php');
