<?php 

include_once 'database.php';

if(empty($_SESSION)) {
    session_start();
  }

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['email'])) {

    try {
 
    $stmt = $conn->prepare("SELECT * from tbl_staffs_a175308_pt2 WHERE fld_email = :email");

   
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       
    $email = $_POST['email'];
    $pass = $_POST['pass'];
         
    $stmt->execute();

    $count = $stmt->rowCount();

    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
   
 
    
    if ($count < 1) {
      echo "<script>alert('User does not exist'); </script>";
    }
    else if($pass != $readrow["fld_password"] && $count==1) {
      echo "<script>alert('Incorrect password.');</script>";
    }
    else if($count == 1) {
      $_SESSION['name'] = $readrow["fld_staff_name"];
      $_SESSION['role'] = $readrow["fld_user_level"];
      echo "<script>alert('You have logged in as {$_SESSION['name']} and your position is {$_SESSION['role']}');document.location='home.php'</script>";
      if(!session_id()) 
        session_start();
    }
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }

 ?>