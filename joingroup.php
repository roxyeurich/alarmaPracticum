<?php
header('Access-Control-Allow-Origin: *'); 
try {
  $conn = new PDO("mysql:host=z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=exkpj1p34bhj631o","lun8ncm1aqsjcp07","is90mkxw6tdln66b");
} catch (PDOException $e){
  echo "Error".$e->getMessage();
}

$passcode =$_POST["passcode"];
$userid =$_POST["userid"];

$query = "SELECT * FROM groups WHERE passcode = '$passcode'";

$result = $conn->query($query);
if($result){
  $groups=$result->fetchAll();
  //var_dump($groups);
  $id=$groups[0]["group_id"];
  
  $query="UPDATE users SET group_id='$id' WHERE id='$userid'";
  $result = $conn->query($query);
  if($result){
    echo json_encode(array(
      'status'=>true,
      'id'=>$id,
    ));
  } else {
    echo json_encode(false);
  }
  //echo json_encode($groups);
  
} else {
  echo json_encode(false);
}

?>

