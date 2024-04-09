<?php 
include_once('../required/server.php'); 
if (!isLoggedIn()) {
 header('location: ../login.php');}
 if ($_SESSION['user']['type'] != 1) {
   header('location: ../index.php');
 }
  
if(isset($_POST['disactive'])){
  $sql = "UPDATE users SET activity =0 where id=".$_POST['userID']."";
  mysqli_query($db, $sql);
  header('location: index.php');
 
}

if(isset($_POST['active'])){
  $sql = "UPDATE users SET activity =1 where id=".$_POST['userID']."";
  mysqli_query($db, $sql);
  header('location: index.php');
 
}

?>
 
 <body>
<?php
    include_once("required/head.php");
    include_once("required/header.php");
    include_once("required/sidebar.php");
?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>  Encrypt and Decrypt text data inside images using PHP & JQuery</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Encrypt and store text data inside images </li>
     </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">  LSB system users :  </h5>


      <div class="panel panel-default">
         <div class="panel-body">
       
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Activity</th>
      <th scope="col">Event</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $query = "SELECT * FROM users where type=0 order by id desc ";

    $result = $conn->query($query);

    $id=1;

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          
          if ($row['activity'] ==1) {
              $activity = 'Actived';
              $btn ='<form method="POST">
                  <input type="hidden"  name="userID" value="'.$row["id"].'">
                  <button type="submit" name="disactive" class="btn btn-outline-primary">
                    Deactivate
                  </button>
            </form>';

          }else{
              $activity = 'Not Actived';
              $btn ='<form method="POST">
                          <input type="hidden"  name="userID" value="'.$row["id"].'">
                          <button type="submit" name="active" class="btn btn-outline-primary">
                            Active
                          </button>
                    </form>';

          }
  
        echo '<tr>
                <th scope="row">'.$id++.'</th>
                <td>'.$row["fname"].' '.$row["lname"]. '</td>
                <td>'.$row["email"].'</td>
                <td>'.$activity.'</td>
                <td>'.$btn.'</td>
              </tr>';

         }
      } else {
        echo "No results";
      }
      ?>

    
  </tbody>
</table>

             
        </div>
      </div>
 
        </div>
      </div>
    </div>
  </div>
</section>
</main>
  <!-- ======= Footer ======= -->
 <?php
 include_once("required/footer.php");
 ?>
</body>
</html>
 

<script>
$(document).ready(function(){
  $('#uploadImage').submit(function(event){
    if($('#uploadFile').val())
    {
      event.preventDefault();
      $('#loader-icon').show();
      $('#loader-progression').show();
      $('#targetLayer').hide();
      $(this).ajaxSubmit({
        target: '#targetLayer',
        beforeSubmit:function(){
          $('.progress-bar').width('50%');
        },
        uploadProgress: function(event, position, total, percentageComplete)
        {
          $('.progress-bar').animate({
            width: percentageComplete + '%'
          }, {
            duration: 1000
          });
        },
        success:function(){
          $('#loader-icon').hide();
          $('#loader-progression').hide();
          $('#targetLayer').show();
        },
        resetForm: true
      });
    }
    return false;
  });
});
</script>
