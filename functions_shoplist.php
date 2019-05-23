<?php 

// Sparar ett listnamn 
function saveListName($conn){

    $name = escapeInsert($conn,$_POST['titel']);
    $id = escapeInsert($conn,$_POST['customerid']);

    $query = "INSERT INTO shoppinglist (ShoppinglistTitle, CustomerID)     VALUES('$name', '$id')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

// Spara produkten och få ut id
// function saveProduct($conn,$productName){
// 
//     $prodName = escapeInsert($conn,$_POST['produktnamn']);
// 
//     $query = "INSERT INTO products (ProductsName) VALUES('$prodName')";
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     $insId = mysqli_insert_id($conn);
// 
//     return $insId;
// }

 
// Kopplar ihop lista med produkter
// function saveProdshoplist($conn,$prodName,$listName){
// 
//     $query = "INSERT INTO prodshoplist (ProdShoplistShopID, ProdShoplistProdID  ) VALUES($listId,$prodId)";
//     echo $query;
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     $insId = mysqli_insert_id($conn);
// 
//     return $insId;
// }

// Sparar i båda tabellerna, anropar funktioner
// function createShoplist($conn){
//     $productName = escapeInsert($conn,$_POST['produktnamn']);
//     $listTitel = escapeInsert($conn,$_POST['listtitel']);      
//     $prodName = saveProduct($conn,$productName);
// 
//   // Spara produkten tillsammans med listan (mellantabellen)
//   saveProdshoplist($conn,$prodName,$listTitel);        
// }

// Visar alla listor med deras varor
// function getAllShoplists($conn,$shoppinglistId){
//     $query = "SELECT Products.ProductsName FROM Shoppinglist 
//     INNER JOIN ProdShoplist ON Shoppinglist.ShoppinglistID = ProdShoplist.ProdShoplistShopID 
//     INNER JOIN Products ON ProdShoplist.ProdShoplistProdID = Products.ProductsID 
//     WHERE ShoppinglistID=".$shoppinglistId;
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     return $result;
// }

// Visar namnet på listan 
// function getShoplistName($conn,$listId){
//     $query = "SELECT ShoppinglistTitle FROM Shoppinglist WHERE ShoppinglistId=".$listId;
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     $row = mysqli_fetch_assoc($result);
// 
//     return $row['ShoppinglistTitle'];
// }

// Hämtar en vara
// function getProductsData($conn,$productsID){
//     $query = "SELECT * FROM products WHERE productsID=".$productsID;
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     $row = mysqli_fetch_assoc($result);
// 
//     return $row;
// }

// visar och sorterar listor i read
function getAllLists($conn){
    $query = "SELECT * FROM shoppinglist ORDER BY ShoppinglistTitle ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
    
    $row = mysqli_fetch_all($result);
    
    return $row;
}

// visar och sorterar listor i read
function getCustomerLists($conn,$id){
    $query = "SELECT * FROM shoppinglist WHERE CustomerID='$id' ORDER BY ShoppinglistTitle ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
    
    $row = mysqli_fetch_all($result);
    
    return $row;
}


// // Hämtar en lista 
// function getListData($conn,$listId){
//     $query = "SELECT * FROM shoppinglist WHERE ShoppinglistID=".$listId;
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// 
//     $row = mysqli_fetch_assoc($result);
// 
//     return $row;
// }


// Uppdatera inköpslista
function updateShoplist($conn){
    $name = escapeInsert($conn,$_POST['titel']);
    $editid = $_POST['updateid'];

    $query = "UPDATE shoppinglist SET ShoppinglistTitle='$name' 
    WHERE ShoppinglistID=".$editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}


// Radera inköpslista
function deleteShoplist($conn,$shoppinglistId){
    
    $query = "DELETE FROM shoppinglist WHERE ShoppinglistID=".$shoppinglistId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}


// function deleteShopliConn($conn,$shoppinglistId){
//     $query = "DELETE FROM prodshoplist WHERE ProdShoplistShopID=".$shoppinglistId;
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
// }

// FUNKTION FÖR INLOGNING:

// Kolla om användaren finns i databasen
// function checklogin($conn, $user, $password){
// 
//     $user = escapeInsert($conn,$user);
//     $password = escapeInsert($conn,$password);
// 
//     $passwordHash=hash("md5", $password);
// 
//     $query = "SELECT * FROM customer WHERE CustomerUsername='$user' AND CustomerPassword='$passwordHash'";
// 
//     $result = mysqli_query($conn,$query) or die("Query failed: $query");
//     // $insId = mysqli_insert_id($conn);
// 
//     if (mysqli_num_rows($result) > 0) {
//       $userMatch = mysqli_fetch_assoc($result);
//       $user = new User($userMatch['CustomerUsername'],$userMatch['bgColor'], $userMatch['CustomerID']);
//       return $user;
//     }
// }



/*
 * Tar bort oönskade html-tecken
 *
 * mysqli_real_escape_string motverkar SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}


?>