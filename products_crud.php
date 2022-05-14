<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

 
 
  

//Create
if (isset($_POST['create'])) {
  $target_dir = "products/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo '<script>alert("File is not an image.")</script>';
      $uploadOk = 0;
    }
  
 
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
 
  // Check file size
  if ($_FILES["image"]["size"] > 10000000) {
    echo '<script>alert("Sorry, your file is too large.")</script>';
    
    $uploadOk = 0;
  }
 
  // Allow certain file formats
  else if($imageFileType != "gif" ) {
    echo  '<script>alert("Sorry,only GIF files are allowed") </script>';

     
    $uploadOk = 0;
  }
 
  // Check if $uploadOk is set to 0 by an error
  else if ($uploadOk == 0) {
    echo '<script>alert("Sorry, your file was not uploaded.")</script>';
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a175308_pt2(fld_product_num,
        fld_product_name, fld_product_price, fld_manufacturer, fld_shirtsize,
        fld_department, fld_rating,fld_date_firstavailable,fld_product_image) VALUES(:pid, :name, :price, :manufacturer,
        :size, :dept, :rating,:datefirst,:image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
      $stmt->bindParam(':size', $shirtsize, PDO::PARAM_STR);
      $stmt->bindParam(':dept', $department, PDO::PARAM_STR);
      $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
      $stmt->bindParam(':datefirst', $date, PDO::PARAM_STR);
      $stmt->bindParam(':image', $picture, PDO::PARAM_STR);

       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manufacturer =  $_POST['manufacturer'];
    $shirtsize = $_POST['shirtsize'];
    $department = $_POST['productdept'];
    $rating = $_POST['rating'];
    $date = $_POST['date']; 
    $picture = ($_FILES["image"]["name"]);
    
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
 

//Update
if (isset($_POST['update'])) {

  $oldimage=$_POST['oldimage'];
  $target_dir = "products/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo '<script>alert("File is not an image.")</script>';
      $uploadOk = 0;
    }
  
 
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
 
  // Check file size
  if ($_FILES["image"]["size"] > 10000000) {
    echo '<script>alert("Sorry, your file is too large.")</script>';
    
    $uploadOk = 0;
  }
 
  // Allow certain file formats
  else if($imageFileType != "gif" ) {
    echo  '<script>alert("Sorry,only GIF files are allowed")</script>';

     
    $uploadOk = 0;
  }
 
  // Check if $uploadOk is set to 0 by an error
  else if ($uploadOk == 0) {
    echo '<script>alert("Sorry, your file was not uploaded.")</script>';
    
  // if everything is ok, try to upload file
  } else {
    
    unlink("products/".$oldimage);
    
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


          

 
  try {


 
      $stmt = $conn->prepare("UPDATE tbl_products_a175308_pt2 SET fld_product_num = :pid,
        fld_product_name = :name, fld_product_price = :price, fld_manufacturer = :manufacturer,
        fld_shirtsize = :size, fld_department = :dept, fld_rating = :rating, fld_date_firstavailable=:datefirst, fld_product_image=:image
        WHERE fld_product_num = :oldpid");

     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
      $stmt->bindParam(':size', $shirtsize, PDO::PARAM_STR);
      $stmt->bindParam(':dept', $department, PDO::PARAM_STR);
      $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
      $stmt->bindParam(':datefirst', $date, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
      $stmt->bindParam(':image', $picture, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $manufacturer =  $_POST['manufacturer'];
    $shirtsize = $_POST['shirtsize'];
    $department = $_POST['productdept'];
    $rating = $_POST['rating'];
    $date = $_POST['date']; 
    $oldpid = $_POST['oldpid'];
    $picture = ($_FILES["image"]["name"]);
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else {
      echo '<script>alert("Sorry, your file was not uploaded.")</script>';
    }
  }
}
 
//Delete
if (isset($_GET['delete'])) {
  $pid = $_GET['delete'];
  $select_stmt=$conn->prepare("SELECT * FROM tbl_products_a175308_pt2 WHERE fld_product_num = :pid");
      $select_stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $select_stmt->execute();
      $delrow=$select_stmt->fetch(PDO::FETCH_ASSOC);
      unlink("products/".$delrow['fld_product_image']);
 
  try {
      
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a175308_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a175308_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];


     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);

    
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>