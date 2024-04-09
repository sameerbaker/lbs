<?php
include('functions.php');
include('../required/server.php');

if(!empty($_FILES))
{
  if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
  {
    sleep(1);
    $source_path = $_FILES['uploadFile']['tmp_name'];
    $target_path = '../dencrypted/' . $_FILES['uploadFile']['name'];
    // echo $target_path;
    if(move_uploaded_file($source_path, $target_path))
    {

    //////////////////////////////// stor to history ////////////////////////
      $sql = "INSERT INTO history (target_path, session_id)
          VALUES ('dencrypted/".$_FILES['uploadFile']['name']."', '".$_SESSION['user']['id']."')";
      $conn->query($sql);     
 
    //////////////////////////////// end  stor to history ////////////////////////

     
    $img = imagecreatefrompng($target_path); //Returns image identifier
    $real_message = ''; //Empty variable to store our message

    $count = 0; //Wil be used to check our last char
    $pixelX = 0; //Start pixel x coordinates
    $pixelY = 0; //start pixel y coordinates

    list($width, $height, $type, $attr) = getimagesize($target_path); //get image size

    for ($x = 0; $x < ($width*$height); $x++) { //Loop through pixel by pixel
      if($pixelX === $width+1){ //If this is true, we've reached the end of the row of pixels, start on next row
        $pixelY++;
        $pixelX=0;
      }

      if($pixelY===$height && $pixelX===$width){ //Check if we reached the end of our file
        echo('Max Reached');
        die();
      }

      $rgb = @imagecolorat($img,$pixelX,$pixelY); //Color of the pixel at the x and y positions
      $r = ($rgb >>16) & 0xFF; //returns red value for example int(119)
      $g = ($rgb >>8) & 0xFF; //^^ but green
      $b = $rgb & 0xFF;//^^ but blue

      $blue = toBin($b); //Convert our blue to binary

      $real_message .= $blue[strlen($blue) - 1]; //Ad the lsb to our binary result

      $count++; //Coun that a digit was added

      if ($count == 8) { //Every time we hit 8 new digits, check the value
          if (toString(substr($real_message, -8)) === '|') { //Whats the value of the last 8 digits?
              // echo ('done<br>'); //Yes we're done now
              echo ' <img  src="dencrypted/'.$_FILES['uploadFile']['name'].'"" class="img-thumbnail" width="300" height="250" />';

                  echo " <a  target=”_blank”  href='dencrypted/".$_FILES['uploadFile']['name']."'> To download the image, click here => ".$_FILES['uploadFile']['name']."</a>   ";
              $real_message = toString(substr($real_message,0,-8)); //convert to string and remove /

            $CHIFRA = "AES-128-CTR";
            $options_IF = 0;
            $decryption_iv = '1234567891011121';
            $decryption_key = $_POST['decryption_key'];
            $encryption = $real_message;
            $decryption_TEXT=openssl_decrypt ($encryption, $CHIFRA, 
            $decryption_key, $options_IF, $decryption_iv);
 
              echo ('</br> <label> Result is :  </label> </br> ');
              echo $decryption_TEXT; //Show

              die;
          }
          $count = 0; //Reset counter
      }

      $pixelX++; //Change x coordinates to next
    }

  }
 }

}

?>
