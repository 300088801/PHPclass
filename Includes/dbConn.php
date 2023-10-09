<?php
// Make Database connection
$dsn ='mysql:host=localhost; dbname=phpclass'; // connect to our sql database on our webserver located on our local host and the name of our databse is phpclass
$username = 'dbuser';
$password = 'dbdev123';
$options = array(
    PDO::ATTR_ERRMODE=> PDO:: ERRMODE_EXCEPTION); // configuration of our PDO to throw an error when there is a problem with the database
?>

