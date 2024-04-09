
<?php
    include_once("required/head.php");
    include_once("required/header.php");
    include_once("required/sidebar.php");
 ?>


<header class="showcase">
    <div class="content">
      <img src="https://th.bing.com/th/id/R.18d60184a2448d065f104ea763764f3d?rik=YB%2bTcpiL9AYXSw&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_437037.png&ehk=lwVBiSUuhB9qwQaDDmmJiWpzdoXKrpMjrR392webuHc%3d&risl=&pid=ImgRaw&r=0" class="logo" alt="LSP Encoder">
      <div class="title">
        Welcome To LSP Encoder
      </div>
      <div class="text">
       The company itself is a very successful company.
      </div>
    </div>
  </header>

  <!-- About -->
  <section class="about bg-light">
    <div class="container">
      <div class="grid-2">
        <div class="center">
          <i class="fas fa-laptop-code fa-10x"></i>
        </div>
        <div>
          <h3  dir="rtl">About Us</h3>
          <p  dir="rtl"> LSB Encoder هي أداة قوية لإخفاء المعلومات ، وهي ممارسة إخفاء الرسائل أو المعلومات داخل بيانات أخرى غير سرية. يسمح برنامجنا للمستخدمين بتضمين رسائل سرية داخل الصور باستخدام طريقة البت الأقل أهمية (LSB). تتضمن هذه الطريقة استبدال وحدات البكسل الأقل أهمية في الصورة بقطع من الرسالة السرية ، مما ينتج عنه صورة متطابقة بصريًا تحتوي أيضًا على معلومات مخفية.

لقد عمل فريق المطورين لدينا بلا كلل لإنشاء برنامج سهل الاستخدام وموثوق وآمن يمكن استخدامه لمجموعة متنوعة من الأغراض ، من الاتصال الشخصي إلى حماية البيانات. نحن نتفهم أهمية الخصوصية والأمان ، وقد صممنا برنامجنا لضمان أن تظل معلوماتك السرية آمنة ومأمونة.

في LSB Encoder ، نحن ملتزمون بتزويد مستخدمينا بأفضل تجربة ممكنة. نحن نقدم واجهة سهلة الاستخدام ووثائق شاملة ودعم عملاء ممتاز لضمان أن مستخدمينا يمكنهم استخدام برنامجنا بكل سهولة وثقة. نقوم باستمرار بتحديث وتحسين برامجنا لتلبية الاحتياجات والتوقعات المتطورة لمستخدمينا.

شكرًا لاختيارك LSB Encoder لتلبية احتياجاتك في إخفاء المعلومات. نحن فخورون بأن نكون جزءًا من رحلة الخصوصية والأمان الخاصة بك.</p>
        </div>
      </div>
    </div>
  </section>
<?php
    include_once("required/footer.php");
 ?>
  <!-- <footer class="center bg-dark">
    <p>LSP Encoder &copy; 2023</p>
  </footer> -->



<style>
    body {
  background: rgba(0, 0, 0, 0.9);
  margin: 0;
  color: #fff;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.showcase::after {
  content: '';
  height: 100vh;
  width: 100%;
  background-image: url(https://image.ibb.co/gzOBup/showcase.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  display: block;
  filter: blur(10px);
  -webkit-filter: blur(10px);
  transition: all 1000ms;
}

.showcase:hover::after {
  filter: blur(0px);
  -webkit-filter: blur(0px);
}

.showcase:hover .content {
  filter: blur(2px);
  -webkit-filter: blur(2px);
}

.content {
  position: absolute;
  z-index: 1;
  top: 10%;
  left: 50%;
  margin-top: 105px;
  margin-left: -145px;
  width: 300px;
  height: 350px;
  text-align: center;
  transition: all 1000ms;
}

.content .logo {
  height: 180px;
  width: 180px;
}

.content .title {
  font-size: 2.2rem;
  margin-top: 1rem;
}

.content .text {
  line-height: 1.7;
  margin-top: 1rem;
}

.container {
  max-width: 960px;
  margin: auto;
  overflow: hidden;
  padding: 4rem 1rem;
}

.grid-3 {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(3, 1fr);
}

.grid-2 {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(2, 1fr);
}

.center {
  text-align: center;
  margin: auto;
}

.bg-light {
  background: #f4f4f4;
  color: #333;
}

.bg-dark {
  background: #333;
  color: #f4f4f4;
}

footer {
  padding: 2.2rem;
}

footer p {
  margin: 0;
}

/* Small Screens */
@media (max-width: 560px) {
  .showcase::after {
    height: 50vh;
  }

  .content {
    top: 5%;
    margin-top: 5px;
  }

  .content .logo {
    height: 140px;
    width: 140px;
  }

  .content .text {
    display: none;
  }

  .grid-3,
  .grid-2 {
    grid-template-columns: 1fr;
  }

  .services div {
    border-bottom: #333 dashed 1px;
    padding: 1.2rem 1rem;
  }
}

/* Landscape */
@media (max-height: 500px) {
  .content .title,
  .content .text {
    display: none;
  }

  .content {
    top: 0;
  }
}

</style>  