<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$group_id =$_POST["group_id"];
$group_name =$_POST["group_name"];
$passcode =$_POST["passcode"];

$query = "SELECT * FROM groups WHERE group_id='$group_id'";

//"SELECT * FROM users WHERE username='$username' AND password = '$password';

//USE THIS TO TEST IF INFO IS GOING INTO DATABASE:
//$query = "INSERT INTO users (email, password, username, status) VALUES ('test', 'test', 'test', 1)";

$result = $conn->query($query);
if($result){
  $passcode=$result->fetchAll();
  echo json_encode($passcode); 
  
} else {
  echo json_encode(false);
}

?>