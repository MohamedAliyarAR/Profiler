<?php
require '../vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");

$profile = $client->profile;
$customerDetails = $profile->customers;

$response = ['success' => false, 'message' => 'Invalid request'];

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];

        if (!empty($_POST['fieldName']) && !empty($_POST['value'])) {
            $fieldName = $_POST['fieldName'];
            $value = $_POST['value'];
            

            $updateArray = [
                $fieldName => $value
            ];

            // Update the data in MongoDB for the specific email
            $filter = ['email' => $email];
            $update = [
                '$set' => $updateArray,
            ];

            $result = $customerDetails->updateOne($filter, $update, ['$upsert' => true]);

            if ($result->getModifiedCount() > 0 || $result->getUpsertedCount() > 0) {
                $response = ['success' => true, 'message' => 'Profile updated successfully'];
            } else {
                $response['message'] = 'Error updating profile';
            }
        } 
        else {
           
            $name = $_POST['name'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];
            $phonenumber = $_POST['phonenumber'];

           
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
            } else {
                $response['message'] = 'Error updating profile';
            }
        }
    } else {
        $response['message'] = 'Missing required fields';
    }


header('Content-Type: application/json');


echo json_encode($response);
?>
