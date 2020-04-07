<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');


print_r($_POST);
// $query = $pdo->query("SELECT * FROM users WHERE name = '$search_value' OR surname = '$search_value'");
// $result = $query->fetchAll();
//
// echo json_encode($result);
