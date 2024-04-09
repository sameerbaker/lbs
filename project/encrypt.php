<?php 
include_once('required/server.php'); 
if (!isLoggedIn()) {
 header('location: login.php');}
 
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
          <h5 class="card-title">  Encrypt Form :  </h5>


              <div class="panel panel-default">
        <div class="panel-heading"><b>Encrypt and store text data inside images using PHP </b></div>
        <div class="panel-body">
          <form id="uploadImage" action="algorithm/encrypt.php" method="post">
            <div class="form-group">
              <label>Select Image :</label>
              <input type="file" class="form-control"  name="uploadFile" id="uploadFile" accept=".jpg" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Text : </label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="4"></textarea>
             </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note : </label>
                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="2"></textarea>
             </div>

             <div class="form-group">
                <label for="exampleFormControlTextarea1">Encrypt Key : </label>
                <textarea class="form-control" name="encrypt_key"  rows="1"></textarea>
             </div>


              <div class="form-group">
                <label for="exampleFormControlTextarea1">Send To  : </label>
               <select name="to_uid"  class="form-control">

                <?php 
                  $query = "SELECT * FROM users WHERE type =0";

                   echo ' <option value="" selected="true" disabled> User :  </option>';

                    $result = $db->query($query);
                     
                       while($row = $result->fetch_assoc()) { 

                          echo '  <option value="'.$row['id'].'"> '.$row['fname'].' '.$row['lname'].' </option>';
                          }
                  ?>
 
              </select>
             </div>



            <div class="form-group  p-4">
              <input type="submit" id="uploadSubmit" value="Send" class="btn btn-info" />
            </div>

             <div id="loader-progression" style="display:none;"> Wait for the decoding of the text inside the image ... </div>
 
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div id="targetLayer" style="display:none;"></div>
          </form>
          <div id="loader-icon" style="display:none;"><img src="assets\loader.gif" /> </div>
            <!-- <a href="dencrypt.php"> =>  to Dencrypt mode click here</a>  -->
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
