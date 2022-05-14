<?php
  include_once 'database.php';
  include_once 'login_status.php'
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Active Sports House Ordering System : Products Details</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
<?php include_once 'nav_bar.php'; ?>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a175308_pt2 WHERE fld_product_num = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
      <?php if ($readrow['fld_product_image'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive img-rounded">
      <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel panel-primary" style="border: 0.5px solid ; border-color: #337ab7;">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <div class="panel-body">
          Below are specifications of the product.
      </div>
      <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['fld_product_num'] ?></td>
        </tr>
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['fld_product_name'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['fld_product_price'] ?></td>
        </tr>
        <tr>
          <td><strong>Manufacturer</strong></td>
          <td><?php echo $readrow['fld_manufacturer'] ?></td>
        </tr>
        <tr>
          <td><strong>Shirt Size</strong></td>
          <td><?php echo $readrow['fld_shirtsize'] ?></td>
        </tr>
        <tr>
          <td><strong>Department</strong></td>
          <td><?php echo $readrow['fld_department'] ?></td>
        </tr>
        <tr>
          <td><strong>Rating</strong></td>
          <td><?php echo $readrow['fld_rating'] ?><span class="iconify" data-icon="emojione:star" style="margin-left: 4px; padding-top: 2px; width: 18px; height: 18px;" ></span></td>
        </tr>
        <tr>
          <td><strong>Date First Available</strong></td>
          <td><?php echo date("d-m-Y",strtotime($readrow['fld_date_firstavailable'])); ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
  
</body>
</html>