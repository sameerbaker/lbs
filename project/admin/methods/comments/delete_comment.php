<?php 
include_once('../../../required/server.php');  

 $query = "
 DELETE from tbl_comment 
 WHERE comment_id = :id
 ";
 $statement = $db_conn->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST["id"]
  )
 );