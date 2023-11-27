<?php


class RedisSessionHandler implements SessionHandlerInterface
{
    public $ttl = 1800; // 30 minutes default
    protected $db;
    protected $prefix;

    public function __construct(PredisClient $db, $prefix = 'PHPSESSID:') {
        $this->db = $db;
        $this->prefix = $prefix;
    }

    public function open($savePath, $sessionName) {
        
    }

    public function close() {
        $this->db = null;
        unset($this->db);
    }

    public function read($id) {
        $id = $this->prefix . $id;
        $sessData = $this->db->get($id);
        $this->db->expire($id, $this->ttl);
        return $sessData;
    }

    public function write($id, $data) {
        $id = $this->prefix . $id;
        $this->db->set($id, $data);
        $this->db->expire($id, $this->ttl);
    }

    public function destroy($id) {
        $this->db->del($this->prefix . $id);
    }

    public function gc($maxLifetime) {
        // no action necessary because using EXPIRE
    }
}

// var_dump($_POST);
$hostname     = "localhost";
$username     = "root";
$dbpassword   = ""; 
$databasename = "profileAuth";
$port         = 3307; 



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
