<?php
include('functions.php');
include('../required/server.php');

if(!empty($_FILES))
{
  if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
  {
    sleep(1);
    $source_path = $_FILES['uploadFile']['tmp_name'];
    $target_path = '../upload/' . $_FILES['uploadFile']['name'];
    if(move_uploaded_file($source_path, $target_path))
    {
  
    //Edit below variables
    $textMsg = $_POST['text']; //To encrypt
    $note    = $_POST['note']; //To encrypt
    $to_uid ='';
    $to_uid    = $_POST['to_uid']; //To encrypt
    $encrypt_key = $_POST['encrypt_key'];
 
    $cipher = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($cipher);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryptionMSG = openssl_encrypt($textMsg, $cipher,$encrypt_key, $options, $encryption_iv);

    $msg = $encryptionMSG;

    $src = $target_path; //Start image

    //////////////////////////////// stor to history ////////////////////////
      $sql = "INSERT INTO history (target_path, msg, note, session_id ,to_uid)
          VALUES ('upload/".$_FILES['uploadFile']['name']."', '".$textMsg."', '".$note."' , '".$_SESSION['user']['id']."', '".$to_uid."' )";
            // echo  $sql;
 
      $conn->query($sql);     
 
    //////////////////////////////// end  stor to history ////////////////////////

    $msg .='|'; //EOF sign, decided to use the pipe symbol to show our decrypter the end of the message
    $msgBin = toBin($msg); //Convert our message to binary
    $msgLength = strlen($msgBin); //Get message length
    $img = imagecreatefromjpeg($src); //returns an image identifier
    list($width, $height, $type, $attr) = getimagesize($src); //get image size

    if($msgLength>($width*$height)){ //The image has more bits than there are pixels in our image
      echo('Message too long. This is not supported as of now.');
      die();
    }

    $pixelX=0; //Coordinates of our pixel that we want to edit
    $pixelY=0; //^

    for($x=0;$x<$msgLength;$x++){ //Encrypt message bit by bit (literally)

      if($pixelX === $width+1){ //If this is true, we've reached the end of the row of pixels, start on next row
        $pixelY++;
        $pixelX=0;
      }

      if($pixelY===$height && $pixelX===$width){ //Check if we reached the end of our file
        echo('Max Reached');
        die();
      }

      $rgb = @imagecolorat($img,$pixelX,$pixelY);  //Color of the pixel at the x and y positions


      $r = ($rgb >>16) & 0xFF; //returns red value for example int(119)              0xFF 1111 1111 (F)
      $g = ($rgb >>8) & 0xFF; //^^ but green
      $b = $rgb & 0xFF;//^^ but blue

      $newR = $r; //we dont change the red or green color, only the lsb of blue
      $newG = $g; //^
      $newB = toBin($b); //Convert our blue to binary
      $newB[strlen($newB)-1] = $msgBin[$x]; //Change least significant bit with the bit from out message
      $newB = toString($newB); //Convert our blue back to an integer value (even though its called tostring its actually toHex)

      $new_color = imagecolorallocate($img,$newR,$newG,$newB); //swap pixel with new pixel that has its blue lsb changed (looks the same)
      imagesetpixel($img,$pixelX,$pixelY,$new_color); //Set the color at the x and y positions
      $pixelX++; //next pixel (horizontally)

    }
    $randomDigit = rand(1,9999999); //Random digit for our filename
    imagepng($img,'../encrypted/result' . $randomDigit . '.png'); //Create image
    $image = ('result' . $randomDigit . '.png'); //Echo our image file name

    imagedestroy($img); //get rid of it
     $result_path = 'encrypted/'.$image.'';
     $last_id = mysqli_insert_id($conn);

      $sql = "UPDATE history SET result_path ='".$result_path."' WHERE id = ".$last_id ."";
      $conn->query($sql);    
 
    echo '<img src="encrypted/'.$image.'"" class="img-thumbnail" width="300" height="250" />';

    echo " <a target=”_blank”  href='encrypted/".$image."'> To download the image, click here => ".$image."</a>";
    }
  }
}
 

?>
