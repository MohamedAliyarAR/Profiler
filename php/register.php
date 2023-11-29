<?php

$hostname     = "viaduct.proxy.rlwy.net";
$username     = "root";
$dbpassword   = "66ghc5DEc1dFg-5HFa6AbG1h5C1Cdc5e"; 
$databasename = "railway";
$port         = 48357;
$conn = new mysqli($hostname, $username, $dbpassword, $databasename, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(!empty($_POST['email']) && !empty($_POST['password'])){
$email    = $_POST['email'];
$password = $_POST['password'];

$selectQuery = "SELECT email FROM customertable WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$rnum = $stmt->num_rows;

if ($rnum == 0) {
    $insertQuery = "INSERT INTO customertable (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    header('Content-Type: application/json');
echo json_encode(['success' => 'Account created successfully.']);
} else {
    header('Content-Type: application/json');
echo json_encode(['error' => 'Email already exists']);
}
$stmt->close();
$conn->close();
}
?>
