<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

if(isset($_POST['ShoppinglistID'])){
    $shoppinglistId = $_POST['ShoppinglistID'];
}else{
    echo "Ingen tillåten post (ShoppinglistID)";
    exit;
}

$deleteShoplist = deleteShoplist($connection,$shoppinglistId);

if(isset($deleteShoplist) && $deleteShoplist > 0 ) {
    $listId = getCustomerLists($connection, $id);

    $output = $listId;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>



