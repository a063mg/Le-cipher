<?php

$key = $_POST['key'];
$checkbox = $_POST['encrypt'];

if($checkbox == 'encrypt'){

  if (empty($key) or empty($_FILES['imgfile']['name'])){
    echo 1;
  }
  else{
    

      $uploadfile = 'images/'.$_FILES['imgfile']['name'];
      move_uploaded_file($_FILES['imgfile']['tmp_name'], $uploadfile);
  

    $filenam = $_FILES['imgfile']['name'];
    require_once('encoder.php');

  }
}
else{

  if (empty($key) or empty($_FILES['imgfile']['name'])){
      echo 1;
  }
  else{


    $uploadfile = 'decode_images/'.$_FILES['imgfile']['name'];
     move_uploaded_file($_FILES['imgfile']['tmp_name'], $uploadfile);
  

  $filenam = $_FILES['imgfile']['name'];
  require_once('decoder.php');
}

}

?>