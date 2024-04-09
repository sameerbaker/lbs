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


<link rel="stylesheet" href="../css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

<main id="main" class="main">
<div class="pagetitle">
  <h1>  Encrypt and Decrypt text data inside images using PHP & JQuery</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Reports </li>
     </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">  LSB system users reports :  </h5>


      <div class="panel panel-default">
         <div class="panel-body">
       
<table class="table table-striped" id="tabelData">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Activity</th>
      <th scope="col">Time & Date</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $query = "SELECT * FROM reports order by id desc ";

    $result = $conn->query($query);

    $id=1;

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
  
        echo '<tr>
                <th scope="row">'.$id++.'</th>
                <td><a href="viowReport.php?reportID='.$row["id"].'">'.$row["name"].'</a></td>
                <td>'.$row["email"].'</td>
                <td>'.$row["subject"].'</td>
                <td>'.$row["crate_at"].'</td>
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
    $('#tabelData').dataTable();
});
</script>