<?php
include_once('../../../required/server.php');  
$error = '';
$uid = '';
$comment_content = '';
 
if(empty($_POST["uid"]))
{
 $error .= '<p class="text-danger">Username is required</p>';
}
else
{
 $uid = $_POST["uid"];
}

if(empty($_POST["post_id"]))
{
 $error .= '<p class="text-danger">post id is required</p>';
}
else
{
 $post_id = $_POST["post_id"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Comment is required
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
 
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO tbl_comment 
 (parent_comment_id, comment, sender_id, post_id) 
 VALUES (:parent_comment_id, :comment, :sender_id, :post_id)
 ";
 $statement = $db_conn->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'           => $comment_content,
   ':sender_id'         => $uid,
   ':post_id'           => $post_id
  )
 );
 $error = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                Comment Added Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
