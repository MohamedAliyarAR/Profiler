<?php


$hostname     = "viaduct.proxy.rlwy.net";
$username     = "root";
$dbpassword   = "66ghc5DEc1dFg-5HFa6AbG1h5C1Cdc5e"; 
$databasename = "railway";
$port         = 48357; 



// Create connection
$conn = mysqli_connect($hostname, $username, $dbpassword, $databasename, $port);

if (!$conn) {
    die("Unable to connect to the database: " . mysqli_connect_error());
}


if(!empty($_POST['email']) && !empty($_POST['password'])){
$email  = $_POST['email'];
$password       = $_POST['password'];
$query = "SELECT email, password FROM customertable WHERE email = ? AND password = ?";
        
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows != 0) {
    

    
    // $redis = new Predis\Client();
    // $redis->connect('localhost',6379);

    
    // $token = bin2hex(random_bytes(32));
    

    // $redis->set($stmt->fetch_assoc()['email'], $token);

    $Message = array("success" => "success",'email'=> $email);
    echo json_encode($Message);
    
} else {
    $Message = array("error" => "The password or email is not correct");
echo json_encode($Message);
}
}
else{
    $Message = array('error'=>'enter every field');
    echo json_encode($Message);
}


?>
