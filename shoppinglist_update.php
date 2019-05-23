<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

if(isset($_POST['titel'])){
    $name = $_POST['titel'];
}else{
    echo "Ingen tillåten post (titel)";
    exit;
}
if(isset($_POST['updateid'])){
    $editid = $_POST['updateid'];
}else{
    echo "Ingen tillåten post (updateid)";
    exit;
}

$updateShoplist = updateShoplist($connection);

if(isset($updateShoplist) && $updateShoplist > 0 ) {
    $listId = getCustomerLists($connection, $id);

    $output = $listId;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>


