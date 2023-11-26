<?php

require '../vendor/autoload.php';

$client= new MongoDB\Client;
        $profile= $client->profile;
        $customerDetails = $profile->customers;


$userdata = $_POST;




        // zqlll
$hostname       = "localhost";
$username       = "root";
$dbpassword     = "";  
$databasename   = "profileAuth";

// Create connection SQL

$conn = mysqli_connect($hostname, $username, $dbpassword, $databasename, 3307);

// Check connection SQL
if (!$conn) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
reg($conn,$userdata);
// soldiers ATTACK
function reg($conn,$userdata) {
    $email  = $userdata['email'];
    $password       = $userdata['password'];

if(!empty($email) && !empty($password)){
    


$select = "SELECT email FROM customertable WHERE email = ? LIMIT 1";
$query = "INSERT INTO customertable (email, password) VALUES (?, ?)";

$stmt = $conn->prepare($select);
$stmt->bind_param("s", $email);  // Corrected variable name
$stmt->execute();
$stmt->store_result();
$rnum = $stmt->num_rows;



if ($rnum == 0) {
    $stmt->close();

    $stmt = $conn->prepare($query);
    
    // Bind parameters
    $stmt->bind_param("ss", $email, $password);  // Corrected variable name

    $execute = $stmt->execute();

    
        
        
        $successMessage = array("success" => "User registration successful");
        echo json_encode($successMessage);
        
       

     
} 
else {
    $errorMessage = array("error" => "Already registered");
    echo json_encode($errorMessage);
}




$stmt->close();
$conn->close();




}
}

?> 
