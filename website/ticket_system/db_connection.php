<?php

// Database configuration
$servername = "localhost"; // Change this to your database servername
$username = "root"; // Change this to your database username
$password = "Admin"; // Change this to your database password
$database = "ticket_db"; // Change this to your database name

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

