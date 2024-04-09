<?php 
include_once('required/server.php'); 
if (!isLoggedIn()) {
 header('location: login.php');
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
      <li class="breadcrumb-item">History </li>
     </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">   Encrypt and Decrypt History :  </h5>


        <div class="panel panel-default">
         <div class="panel-body">
        
             <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <form class="row g-3" method="POST" enctype="multipart/form-data" >

                                        <div class="table-responsive">
                                         <table class="table table-striped table-bordered complex-headers dataTable" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" >
                                                <thead>
                                                    <tr>
                                                      <th rowspan="1" colspan="1">ID</th>
                                                      <th rowspan="1" colspan="1">Process ID</th>
                                                      <th rowspan="1" colspan="1">Image</th>
                                                      <th rowspan="1" colspan="1">Note</th>
                                                      <th rowspan="1" colspan="1">Date</th>
 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                           
                                         <?php 
                                         $counter =1;
                                         $sql = "SELECT * FROM history where session_id = ".$_SESSION['user']['id']." order by id desc";
                                          $result = $conn->query($sql);

                                          if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {

                                               echo '  <tr role="row" class="even">

                                                       <td class="sorting_1">  '.$counter.'</td>
                                                       <td>'. $row['id'].'</td>
                                                       <td> 

                                                          <a href="'. $row['target_path'].'" data-lightbox="example-1">
                                                            <img src="'. $row['target_path'].'" alt="Lights" width="200" height="200" >
                                                          </a>

                                                          </td>

                                                       <td>'. $row['note'].'</td>
                                                       <td>'. $row['date'].'</td>
                                                        
                                                       </tr>';
                                                           $counter ++ ;
                                            }  

                                          } else {
                                            echo "0 results";
                                          }
                                          $conn->close();

                                        
                                                  ?>      
                                                    

 
                                                   </tbody>
                                                <tfoot>
                                                    <tr>
                                                      <th rowspan="1" colspan="1">ID</th>
                                                      <th rowspan="1" colspan="1">Process ID</th>
                                                      <th rowspan="1" colspan="1">Image</th>
                                                      <th rowspan="1" colspan="1">Text</th>
                                                      <th rowspan="1" colspan="1">Date</th>
    
                                                    </tr>
                                                </tfoot>
                                            </table> 
                                            </form>
                                            </div>
                                        </div>
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
 
 