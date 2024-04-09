<?php
  
      ///////////////////   OPJ conection 
    $db = new mysqli("localhost", "root", "");
    mysqli_set_charset($db, 'utf8');
    mysqli_select_db($db,"sm_lsb");
    ///////////////////   function conection 
    $conn = mysqli_connect('localhost', 'root','', 'sm_lsb');
    $conn->set_charset("utf8");
    ///////////////////   PDO conection 
    $db_host='localhost';
    $db_user='root';
    $db_pass='';
    $db_name='sm_lsb';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_conn->exec("set names utf8");
    } catch(PDOException $ex) {
        die("Failed to connect to the database: " . $ex->getMessage());
    }

?>