<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

// om customerid finns anropas $listId
if(isset($_GET['customerid']) && $_GET['customerid'] > 0 ){
    $listId = getCustomerLists($connection,$_GET['customerid']);
}else{
    echo "Inget giltligt ID";
}

$output = $listId;

echo json_encode($output); 

// Stänger databaskopplingen
dbDisconnect($connection);
?> 


