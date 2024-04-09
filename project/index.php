<?php 
include_once('required/server.php'); 
if (!isLoggedIn()) {
 header('location: login.php');}

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
<main id="main" class="main" dir="rtl">
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
  <div class="row" >
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
 

              <div class="panel panel-default">
        <div class="panel-heading"> 
               <h5 class="card-title">  الرئيسية  :  </h5>


              <div class="panel panel-default">
        <div class="panel-heading"> 
                <b> عرض المحتوى: </ b>
        </div>
        <div class="panel-body"><br>
        
         <ol>
             <li> البيانات التي يتم نقلها في خطر من المتسللين. نقوم بتشفيرها بخوارزميات لحماية البيانات من الاختراق. </ li>
             <li> الخصوصية: يساعد التشفير في حماية خصوصيتك عبر الإنترنت من خلال تحويل المعلومات الشخصية إلى رسائل مخصصة لأفراد معينين وليس لأي شخص آخر. </ li>
             <li> الابتعاد عن حرائق القراصنة: غالبًا ما يسرق مجرمو الإنترنت المعلومات الشخصية لمستخدمي مواقع الويب المختلفة لتحقيق مكاسب مالية. </ li>
             <li> الأمان: يتيح لك التشفير الحماية بأمان للبيانات التي لا تريد أن يصل إليها أي شخص آخر. تستخدمها الشركات لحماية أسرارها ، وتستخدمها الحكومات لتأمين المعلومات السرية ، ويستخدمها العديد من الأفراد لحماية المعلومات الشخصية. </ li>
             <li> منع برامج التجسس: يُستخدم التشفير لحماية محتويات الملفات بأمان بطريقة تحميها من برامج التجسس ، وإذا سُرق جهازك ، فلن يتمكن اللصوص من فتح هذه الملفات.
             </li>
             <li> حماية الأجهزة المتعددة: يمكنك استخدامها عبر مجموعة متنوعة من الأجهزة. من أهم مزايا تقنية التشفير الحديثة أنه يمكنك تطبيقها على جميع أو معظم الأجهزة التقنية التي تستخدمها.
             </li>
             <li> زيادة الثقة: حتى عندما لا تكون هناك حاجة لتشفير البيانات بسبب لوائح الخصوصية ، تختار بعض الشركات القيام بذلك لتظهر لعملائها أنهم يأخذون الخصوصية على محمل الجد.
             </li>
 
           </ol>
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
              <p>   اجمالي العمليات  </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 container_viow">
            <div class="count-box">
             <i class="ri-file-chart-line"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="0" class="purecounter"><?=countReports()?></span>
              <p>تقارير المستخدمين </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 container_viow">
            <div class="count-box">
              <i class="bi bi-person-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="0" 
              class="purecounter"><?=$ActiveSESSIONS;?></span>
              <p> الجلسات النشطة   </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 container_viow" >
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="0" class="purecounter"><?=countClients()?></span>
              <p>  اجمالي المستحدمين  </p>
            </div>
          </div>

        </div>

      </div>

    </section>

<section id="counts" class="counts section-bg interactions card " >
    <!-- ======= Why Us Section ======= -->

         <div class="panel-heading"> 
          <h5 class="card-title">   تواصل معنا  :  </h5>
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
