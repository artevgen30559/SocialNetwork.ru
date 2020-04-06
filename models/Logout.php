<?php
session_start();

$_SESSION['id'] = null;
echo json_encode('Logout did');
