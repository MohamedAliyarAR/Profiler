<?php
require 'vendor/autoload.php';
// $mongoUri = 'mongodb://localhost:27017/;
try {
    $mongoClient = new MongoDB\Client;
    echo "MongoDB Connection successful!";
    // $mongoDB = $mongoClient->selectDatabase();
    echo "Selected MongoDB Database successfully";
} catch (Exception $e) {
    echo "MongoDB Connection failed: " . $e->getMessage();
}

?>