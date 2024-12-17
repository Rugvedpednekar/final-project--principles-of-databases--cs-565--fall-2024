<?php

// Database configuration
const DBNAME = "passwords";
const DBHOST = "localhost";
const DBUSER = "passwords_user";
const DBPASS = "k(D2Whiue9d8yD";

// Secret key for encryption/decryption
const SECRET_KEY = "MySecureKey123!@#";

// PDO Connection
try {
    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, DBUSER, DBPASS, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>
