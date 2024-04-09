<?php 
include_once('../required/server.php'); 
if (!isLoggedIn()) {
 header('location: ../login.php');}
 if ($_SESSION['user']['type'] != 1) {
   header('location: ../index.php');
 }

$data = getReportID($_GET['reportID']);
 

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
      <li class="breadcrumb-item">Reports </li>
     </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">  <?=$data['name']?> :  </h5>


              <div class="panel panel-default">
        <div class="panel-heading"> 
                <b><?=$data['subject']?>  : </b>
        </div>
        <div class="panel-body"><br>
        
          
                <p><?=$data['message']?>  : </p>
           
           
        </div>

        <div class="panel-heading"> 
              <p><b> USER EMAIL : </b> <?=$data['email']?> </p>
               <p><b>  DATA CRATED : </b><?=$data['crate_at']?> </p>
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
 
 