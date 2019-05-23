<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla kunder 
$allLists = getAllLists($connection);

$output = $allLists;

// (gör om till jsonformat)
echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>