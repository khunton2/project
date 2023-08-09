<?php

require_once 'config/db.php';

$u_id = $_POST['u_id'];
$quiz_score = $_POST['quiz_score']; 
  $stmt = $conn->prepare("UPDATE tbl_member  SET quiz_score = :quiz_score  WHERE tbl_member.u_id = :u_id");
  $stmt->bindParam(':quiz_score', $quiz_score , PDO::PARAM_INT);
  $stmt->bindParam(':u_id', $u_id , PDO::PARAM_STR);
  $stmt->execute();
  
?>