<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}


$id=$_POST['id'];
$query="SELECT SUM(score) AS score FROM tasks WHERE user_id=$id";

$result = $conn->query($query);
if($result){
  
  $tasks=$result->fetchAll();
  echo json_encode($tasks); 
  
} else {
  echo json_encode(false);
}

?>