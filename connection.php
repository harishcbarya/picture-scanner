<?php 

$server = 'Localhost';
$name  = 'root';
$password = "";
$database = 'img_scanner';

$conn = new mysqli($server,$name,$password,$database);

if ($conn->connect_error){

    die("Connection Failed:" .$conn->connect_error );

}

echo "Connection Success";

?>