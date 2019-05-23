<?php

 
 // Skapar databaskopplingen
function dbConnect(){
	$connection = mysqli_connect("localhost", "root", "", "labb2db")
        or die("Could not connect");
    mysqli_select_db($connection,"labb2db") or die("Could not select database");
	return $connection;
}
	
// stänger databaskopplingen
function dbDisconnect($connection){
	mysqli_close($connection);
}
?>