<?php
    $dsn = 'mysql:host=localhost;dbname=chartitmd_db';
    $username = 'xamarin';
    $password = '8IrVhZgVvj0LUFOf';

    try {
        $db = new PDO($dsn, $username, $password);
        // Force all errors to return exception instead.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include 'database_error.php';
        exit();
    }