<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$location_main =$_POST["location_main"];

$query = "SELECT * FROM users WHERE location_main='$location_main'";

$result = $conn->query($query);
if($result){
  $users=$result->fetchAll();
  echo json_encode($users); 
  
} else {
  echo json_encode(false);
}

?>