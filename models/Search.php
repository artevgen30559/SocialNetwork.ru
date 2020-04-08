<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/config/db.php');

// Parse raw data
$search_value = trim(file_get_contents('php://input'));

$query = $pdo->query("SELECT * FROM users WHERE name LIKE '$search_value%' OR surname LIKE '$search_value%' LIMIT 5");
$result = $query->fetchAll();
echo json_encode($result);
