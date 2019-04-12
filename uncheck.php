<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$id =$_POST["task_id"];

$query = "UPDATE tasks SET user_id=NULL WHERE task_id='$id'";
echo $query;
  
$result = $conn->query($query);
if($result){
  echo json_encode(true); 
  
  
} else {
  echo json_encode(false);
}

?>