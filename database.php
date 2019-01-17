<?php

/*
    Product Counter Simulator Using PHP and JS.
    Create Table :
    1. product
        -id
        -productName
        -productPrice
*/

$servername = "";
$username = "";
$password = "";
$database = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
