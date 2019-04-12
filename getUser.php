<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$id =$_POST["id"];

$query = "SELECT users.id, users.username, groups.location AS location_main FROM users 
LEFT JOIN groups ON groups.group_id = users.group_id 
WHERE users.id='$id'";

//USE THIS TO TEST IF INFO IS GOING INTO DATABASE:
//$query = "INSERT INTO users (email, password, username, status) VALUES ('test', 'test', 'test', 1)";

$result = $conn->query($query);
if($result){
  $users=$result->fetchAll();
  echo json_encode($users); 
  
} else {
  echo json_encode(false);
}

?>