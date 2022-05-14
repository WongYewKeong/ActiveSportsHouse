<?php
  include_once 'products_crud.php';
  include_once 'login_status.php'
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Active Sports House Ordering System : Products</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  

  <script src="jquery-3.6.0.min.js"></script>
  <script >
    $(document).ready(function() {
      $("#btn_create, #btn_update,#btn_clear").mouseenter(function(){
        
        $(this).css("color", "#005bea" );
        $(this).css("background-color", "lightblue");
      
      
  });
      
  
  $("#btn_create, #btn_update,#btn_clear").mouseleave(function(){
        $(this).css("color", "initial" );
        $(this).css("background-color", "white");
  });
 });
  
  
  </script>

</head>
<body>
  <?php include_once 'nav_bar.php'; ?>

<div class="container-fluid" >
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data" >
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
      <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID"  value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>"required>   
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" > 
       <?php } ?>


      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
      <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>">
         <?php } ?>

      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
      <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="price" type="number" min="1" step=".01" class="form-control" id="productprice" placeholder="Product Price"  value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="price" type="number" min="1" step=".01" class="form-control" id="productprice" placeholder="Product Price"  readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>">
        <?php } ?>

      </div>
        </div>
      <div class="form-group">
          <label for="productmanufacturer" class="col-sm-3 control-label">Manufacturer</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <select name="manufacturer" class="form-control" id="productmanufacturer" required>
        <option value="">Please select</option>
        <option value="Under Armour" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Under Armour") echo "selected"; ?>>Under Armour</option>
        <option value="adidas" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="adidas") echo "selected"; ?>>adidas</option>
        <option value="Nike" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Nike") echo "selected"; ?>>Nike</option>
        <option value="New Balance" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="New Balance") echo "selected"; ?>>New Balance</option>
        <option value="Reebok" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Reebok") echo "selected"; ?>>Reebok</option>
      </select> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <select  name="manufacturer" class="form-control" id="productmanufacturer" disabled="true">
        <option value="">Please select</option>
        <option value="Under Armour" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Under Armour") echo "selected"; ?>>Under Armour</option>
        <option value="adidas" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="adidas") echo "selected"; ?>>adidas</option>
        <option value="Nike" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Nike") echo "selected"; ?>>Nike</option>
        <option value="New Balance" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="New Balance") echo "selected"; ?>>New Balance</option>
        <option value="Reebok" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Reebok") echo "selected"; ?>>Reebok </option>
      </select>
      <?php } ?>
    </div>
        </div>  
      <div class="form-group">
          <label for="shirtsize" class="col-sm-3 control-label">Shirt Size</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <select name="shirtsize" class="form-control" id="shirtsize" required>
        <option value="">Please select</option>
      <option value="Small" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Small") echo "selected"; ?>>Small</option>
        <option value="Medium" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Medium") echo "selected"; ?>>Medium</option>
        <option value="Large" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Large") echo "selected"; ?>>Large</option>
         </select>
         <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
          <select name="shirtsize" class="form-control" id="shirtsize" disabled="true">
        <option value="">Please select</option>
      <option value="Small" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Small") echo "selected"; ?>>Small</option>
        <option value="Medium" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Medium") echo "selected"; ?>>Medium</option>
        <option value="Large" <?php if(isset($_GET['edit'])) if($editrow['fld_shirtsize']=="Large") echo "selected"; ?>>Large</option>
         </select>
        <?php } ?>

      </div>
        </div>    
        <div class="form-group">
          <label for="productdept" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-9">
           <?php  if($_SESSION['role'] == "Admin"){ ?>
          <div class="radio" >
            <label>
      
        <input name="productdept" type="radio" id="productdept" value="Mens" required <?php if(isset($_GET['edit'])) if($editrow['fld_department']=="Mens") echo "checked"; ?>> Mens
        </label>
          </div>
          <div class="radio">
            <label>
      <input name="productdept" type="radio" id="productdept" value="Womens" <?php if(isset($_GET['edit'])) if($editrow['fld_department']=="Womens") echo "checked"; ?>> Womens
      </label>
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <div class="radio" >
            <label>
      
        <input name="productdept" type="radio" id="productdept" value="Mens" disabled="true" <?php if(isset($_GET['edit'])) if($editrow['fld_department']=="Mens") echo "checked";  ?>> Mens
        </label>
          </div>
          <div class="radio">
            <label>
      <input name="productdept" type="radio" id="productdept" value="Womens" disabled="true" <?php if(isset($_GET['edit'])) if($editrow['fld_department']=="Womens") echo "checked"; ?>> Womens
      </label>
      <?php } ?>
            </div>
         </div>
      </div>
        <div class="form-group">
          <label for="rating" class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-9">
       <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="rating" type="number" min="1" max="5" step="0.1" class="form-control" id="rating" placeholder="Rating"value="<?php if(isset($_GET['edit'])) echo $editrow['fld_rating']; ?>"required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="rating" type="number" min="1" max="5" step="0.1" class="form-control" id="rating" placeholder="Rating"readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_rating']; ?>">
        <?php } ?>
      </div>
        </div>  
      <div class="form-group">

          <label for="datefirst" class="col-sm-3 control-label">Date First Available</label>
          <div class="col-sm-9">
         <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="date" type="date" class="form-control" id="datefirst"  value="<?php if(isset($_GET['edit'])) echo $editrow['fld_date_firstavailable']; ?>"required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
       <input name="date" type="date" class="form-control" id="datefirst"  readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_date_firstavailable']; ?>">
        <?php } ?>
     </div>
        </div>

        <div class="form-group">
          <label for="image" class="col-sm-3 control-label">Product Image</label>
          <div class="col-sm-9">
            <div class="file-upload">
  <div class="file-select">
             <div class="file-select-button" id="fileName">Choose File</div>
    <div class="file-select-name" id="noFile">No file chosen...</div>
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="image" type="file"  id="image" required>
      <input type="hidden" name="oldimage" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>">
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="image" type="file"  id="image" disabled="true">
        <?php } ?>
    </div>
  </div>
</div>
</div>


        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php  if($_SESSION['role'] == "Admin"){ ?>
      <?php if (isset($_GET['edit'])) { ?>
         <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
      <button class="btn btn-default" type="submit" name="update" id="btn_update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create" id="btn_create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
    
      <button class="btn btn-default" type="reset" id="btn_clear"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <?php if (isset($_GET['edit'])) { ?>
         <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
      <button class="btn btn-default" onclick=" confirm('You do not have right to update product')" type="reset" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" onclick=" confirm('You do not have right to add product')" type="reset" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
    
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      <?php } ?>
      </div>
      </div>
    </form>
    </div>
      </div>
     <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr >
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Manufacturer</th>
          <th>Shirt Size</th>
          <th>Department</th>
          <th>Rating</th>
          <th>Date First Available</th>
          <th></th>
        
        
        
      </tr>
      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a175308_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_manufacturer']; ?></td>
        <td><?php echo $readrow['fld_shirtsize']; ?></td>
        <td><?php echo $readrow['fld_department']; ?></td>
        <td><?php echo $readrow['fld_rating']; ?></td>
        <td><?php echo date("d-m-Y",strtotime($readrow['fld_date_firstavailable'])); ?></td>
        <td>
          <?php  if($_SESSION['role'] == "Admin"){ ?>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
            <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a  class="btn btn-success btn-xs" onclick="return confirm('You do not have right to update product');" disabled role="button">Edit</a>
          <a  onclick="return confirm('You do not have right to delete product');" class="btn btn-danger btn-xs" disabled role="button">Delete</a>
          <?php } ?>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
      
    </table>
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a175308_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
$('#image').bind('change', function () {
  var filename = $("#image").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>