<?php
require '../vendor/autoload.php';

use MongoDB\Client;

$mongoHost = "monorail.proxy.rlwy.net";
$mongoPassword = "ba3dFdf5CcEFdA62aBf6gFe2eeEGEdcC";
$mongoPort = 34977;
$mongoUser = "mongo";

$connectionString = "mongodb://$mongoUser:$mongoPassword@$mongoHost:$mongoPort";

$client = new Client($connectionString);



$profile = $client->profile;
$customerDetails = $profile->customers;

$response = ['success' => false, 'message' => 'Invalid request'];

    
        

if (!empty($_POST['fieldName']) && !empty($_POST['value']) && !empty($_POST['email'])) {
    $fieldName = $_POST['fieldName'];
    $value = $_POST['value'];
    $email = $_POST['email'];

    $updateArray = [
        $fieldName => $value
    ];

    // Update the data in MongoDB for the specific email
    $filter = ['email' => $email];
    $update = [
        '$set' => $updateArray,
    ];

    try {
        $result = $customerDetails->updateOne($filter, $update, ['upsert' => true]);

        if ($result->getModifiedCount() > 0 || $result->getUpsertedCount() > 0) {
            $response = ['success' => true, 'message' => 'Profile updated successfully'];
        } else {
            $response['message'] = 'Error updating profile';
        }
    } catch (Exception $e) {
        $response['message'] = 'MongoDB error: ' . $e->getMessage();
    }
} elseif (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['dob']) && !empty($_POST['phonenumber'])) {

            $name = $_POST['name'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
           
            $filter = ['email' => $email];
            $update = [
                '$set' => [
                    'name' => $name,
                    'age' => $age,
                    'dob' => $dob,
                    'phonenumber' => $phonenumber,
                ],
            ];

            $result = $customerDetails->updateOne($filter, $update, ['upsert' => true]);

            if ($result->getModifiedCount() > 0 || $result->getUpsertedCount() > 0) {
                $response = ['success' => true, 'message' => 'Profile updated successfully'];
            } 
             else {
                $response['message'] = 'Error updating profile!!';
            }
        }
    
    
    else {
        $response['message'] = 'Missing required fields';
    }


header('Content-Type: application/json');


echo json_encode($response);
?>
