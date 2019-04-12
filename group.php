<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$group_name =$_POST["group_name"];
$passcode =$_POST["passcode"];
$userid =$_POST["userid"];
$location = $_POST["location"];


$query = "INSERT INTO groups (group_name, passcode, location) VALUES ('$group_name','$passcode', '$location')";

//"SELECT * FROM users WHERE username='$username' AND password = '$password';
//$query = "INSERT INTO users (email, password, username, status) VALUES ('test', 'test', 'test', 1)";

$result = $conn->query($query);
if($result){
  $id = $conn->lastInsertId();
  
  $query="UPDATE users SET group_id='$id', admin=2 WHERE id='$userid'";
  $result = $conn->query($query);
  if($result){
    echo json_encode(array(
    'status'=>true,
    'id'=>$id,
    'admin'=>2
  ));
  } else {
    echo json_encode(false);
  }

} else {
  echo json_encode(false);
}

?>