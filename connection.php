<?php

$servername = "localhost";  
$username = "root";
$password = "sedorifA26";
$database = "practice_db";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Error" . $conn->connect_error);
} else {
}