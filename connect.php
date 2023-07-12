<?php
// Connection details
$server = 'localhost'; // Server name
//$user = 'hyvoycom_rangga'; // User name
$user = 'rangga';
//$password = '20061988rangga';
$password = 'rangga'; // User password
//$database = 'hyvoycom_payroll'; // Database name
$database = 'sample';

// Connection to database
$connect = mysqli_connect($server, $user, $password, $database);
