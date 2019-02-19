<?php
$dsn = 'mysql:host=localhost;dbname=cim';
$username = 'CIMUser';
$password = 'secret';
try {
    /** @var PDO $db */
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit();
}
