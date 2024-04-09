<?php 
include_once('required/server.php'); 
if (!isLoggedIn()) {
 header('location: login.php');}
 $ActiveSESSION = count(scandir(ini_get("session.save_path")));

 if (isset($_POST['send'])) {
    extract($_POST);
    $sql = "INSERT INTO reports
            SET 
            name   = '".$name."',
            email  = '".$email."',
            subject= '".$subject ."',
            message=  '".$message."'
            ";
     mysqli_query($db , $sql);
     header('Location: index.php');

 }
 
?>
 
 <body>
<?php
    include_once("required/head.php");
    include_once("required/header.php");
    include_once("required/sidebar.php");
?>
<style>
  .interactions{
    background-color: #ffff;
    padding: 1%;
    font-size: 1.5em;
  }
.container_viow{
/*  border:1px solid;*/
  padding: 1%;
  border: 1px solid;
  border-style:dotted ;

}
</style>
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
          <h5 class="card-title">  Community :  </h5>

       <div class="panel panel-default">
        <div class="panel-heading"> 
                <b>Community Center : </b>
        </div>
        <div class="panel-body"><br>
          <div id="display_comment"></div> 
         </div>
          <div class="col-lg-8 p-5">
            <form method="POST" id="comment_form" >
              <div class="form-group"> 
                <input type="hidden" name="uid" id="uid"  value="<?=@$_SESSION['user']['id']?>" />
                 <input type="hidden" name="post_id" id="post_id" value="1"/>
              </div>
              <div class="form-group p-2">
                 <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="4"></textarea>
              </div>
              <div class="form-group">
                 <input type="hidden" name="comment_id" id="comment_id" value="0" />
                 <?php 
                 if (isLoggedIn()) {
                   echo '<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Comment" />';
                 }  else{
                  echo '<input type="submit" class="btn btn-outline-danger" value="Must Login to comment" disabled />';
                 }
 
                 ?>
 
              </div>
             </form>
              <br />
          <span id="comment_message"></span>
         <br />
       
 

        </div>

      </div>
 
        </div>
      </div>
    </div>
  </div>
</section>


<section id="counts" class="counts section-bg interactions card ">
      <div class="container">

        <div class="row"> 

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0 container_viow">
            <div class="count-box">
             <i class="ri-cpu-line"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="0" class="purecounter"><?=countMethods()?></span>
              <p>   Total Methods </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 container_viow">
            <div class="count-box">
             <i class="ri-file-chart-line"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="0" class="purecounter"><?=countReports()?></span>
              <p>User Reports</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 container_viow">
            <div class="count-box">
              <i class="bi bi-person-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="0" 
              class="purecounter"><?=$ActiveSESSION;?></span>
              <p> Active Sessions  </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 container_viow" >
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="0" class="purecounter"><?=countClients()?></span>
              <p>  Total users </p>
            </div>
          </div>

        </div>

      </div>

    </section>

<section id="counts" class="counts section-bg interactions card " >
    <!-- ======= Why Us Section ======= -->

         <div class="panel-heading"> 
          <h5 class="card-title">  Contact Us :  </h5>
        </div>

        <div class="row" align="center">
 

          <div class="col-lg-12 mt-5 mt-lg-0 m-5">
                    <form method="post" class="php-email-form col-lg-7 mt-5 mt-lg-0">
               <div class="row gy-4">
                <?php
                if (isLoggedIn()) {
                  
                echo '
                <div class=col-md-6>
                  <input type="text" id = "name" class="form-control" name="name" value ="'.$FullName.'" required>
                </div>
                <div class="col-md-6 ">
                <input type="text" class="form-control" name="email" id = "email"  value ='.$_SESSION['user']['email'].'>
                </div>';
                }else{
                  echo '
                   <div class=col-md-6>
                  <input type="text" id = "name" class="form-control" name="name" placeholder="Your Name"required>
                </div>
                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" id = "email" placeholder="Your Email" required>
                </div>';
                }
                ?>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" id = "subject" placeholder="title" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" id = "message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                   <button type="submit" name="send" class="btn btn-outline-primary"  id="send">  Send Messge </button>
 
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->



</main>
  <!-- ======= Footer ======= -->
 <?php
 include_once("required/footer.php");
 ?>
</body>
</html>


<script>
 
 load_comment();


 
 function load_comment()
 {

  $.ajax({
   data:{'page_id':1},
   url:"methods/comments/fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }



  $('#comment_form').on('submit', function(event){

  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"methods/comments/add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
     load_comment();

    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');

    } 
   }
  })
 });
 
 


   /////////////////////// SET PARENT COMMENT VALUE  ///////////////////////

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_content').focus();
 });

 
 


</script>