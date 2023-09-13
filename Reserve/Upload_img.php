<!DOCTYPE html>
<html>
<body>

<form action="Upload_img.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php
if(isset($_POST['submit'])){
  $flie = $_FILES['fileToUpload'];
  print_r($flie);
  $flieName = $_FILES['fileToUpload']['name'];
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$fileType = strtolower($_FILES['fileToUpload']['type']);
if ($fileType != 'application/pdf') {
    echo 'The file must be a PDF file.';
}else{
    echo 'The file is a PDF file.';
    $uploadOk = 1;
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". ( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>