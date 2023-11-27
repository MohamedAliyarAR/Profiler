<?php

require '../vendor/autoload.php';

use MongoDB\Client;

// Connect to MongoDB
$client = new Client("mongodb://localhost:27017");

// Select the "profile" database and "customers" collection
$profile = $client->profile;
$customerDetails = $profile->customers;



    
    if(!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['dob']) && !empty($_POST['phonenumber']) && !empty($_POST['email'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];

    

    // Update the data in MongoDB for the specific email
    $filter = ['email' => $email];
    $update = [
        '$set' => [
            'name' => $name,
            'age' => $age,
            'dob' => $dob,
            'phonenumber' => $phonenumber,
        ],
    ];
    
    
    

    // Check if the update was successful
    $result = $customerDetails->updateOne($filter, $update, ['upsert' => true]);

    // Check if the update was successful
    if ($result->getModifiedCount() > 0 || $result->getUpsertedCount() > 0) {
        $response = ['success' => true, 'message' => 'Profile updated successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Error updating profile'];
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    }
?>
