<?php

//Database Credentials
$hostname = "127.0.0.1";
$username = "root";
$password = "1235813";
$dbname = "project_perumahan";

// Create Connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection Refused!");
}
