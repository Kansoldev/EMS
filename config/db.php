<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "ems";

    try {
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";

        // Create PDO instance to connect to the database
        $pdo = new PDO($dsn, $user, $password);

        // Set default attribute ERROR mode
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Set default fetch mode
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }