<!-- Pour dl un fichier -->


<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo '<pre>' ;
    // var_dump($_FILES) ;
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["photo"]["name"] ;
    $filename = $_FILES["photo"]["type"] ;
    $filename = $_FILES["photo"]["size"] ;
    }
    else{

    }
    // }
    } 
    else {
        ?>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ; ?>" enctype="multipart/form-data">
        <input type="file" name="photo">
        <button>Send</button>
    </form>
    <?php
    }





$target_dir = "uploads/" ;
 var_dump($_FILES);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
$maxsize = 5 * 1024 * 1024;
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>