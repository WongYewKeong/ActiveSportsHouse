<?php
  include_once 'staffs_crud.php';
  include_once'login_status.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Active Sports House Ordering System : Staffs</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Staff</h2>
      </div>
    <form action="staffs.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>">
        <?php } ?>
      </div>
        </div>
      <div class="form-group">
          <label for="staffname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="name" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required> 
       <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="name" type="text" class="form-control" id="staffname" placeholder="Staff Name" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>">
         <?php } ?>
      </div>
        </div>    
        <div class="form-group">
          <label for="gender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="gender" value="Male" required <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?>> Male
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="gender" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?>> Female 
      </label>
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <div class="radio">
            <label>
      <input name="gender" type="radio" id="gender" value="Male" disabled="true" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?>> Male
      </label>
          </div>
          <div class="radio">
            <label>
      <input name="gender" type="radio" id="gender" value="Female" disabled="true" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?>> Female 
      </label>
       <?php } ?>
            </div>
          </div>
      </div>
      <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_email']; ?>" required> 
       <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="email" type="email" class="form-control" id="email" placeholder="Email" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_email']; ?>">
        <?php } ?>
      </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <input name="pass" type="password" class="form-control" id="pass" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_password']; ?>" required> 
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <input name="pass" type="password" class="form-control" id="pass" placeholder="Password" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_password']; ?>">
        <?php } ?>
      </div>
        </div>
        <div class="form-group">
          <label for="userlevel" class="col-sm-3 control-label">User Level</label>
          <div class="col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <select name="userlevel" class="form-control" id="userlevel" required>
        <option value="">Please select</option>
      <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_user_level']=="Admin") echo "selected"; ?>>Admin</option>
        <option value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_user_level']=="Normal Staff") echo "selected"; ?>>Normal Staff</option>
      </select>
      <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <select name="userlevel" class="form-control" id="userlevel" disabled="true">
        <option value="">Please select</option>
      <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_user_level']=="Admin") echo "selected"; ?>>Admin</option>
        <option value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_user_level']=="Normal Staff") echo "selected"; ?>>Normal Staff</option>
      </select>
      <?php } ?>
    </div>
        </div>
     
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <?php  if($_SESSION['role'] == "Admin"){ ?>
      <?php if (isset($_GET['edit'])) { ?>
         <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
      <button class="btn btn-default" type="submit" name="update" id="btn_update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create" id="btn_create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset" id="btn_clear"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
          <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
            <?php if (isset($_GET['edit'])) { ?>
         <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
      <button class="btn btn-default" onclick=" confirm('You do not have right to update staff')" type="reset" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" onclick=" confirm('You do not have right to add staff')" type="reset" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
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
        <h2>Staffs List</h2>
      </div>
      <table class="table table-striped table-bordered">
    <tr>
    
        <th>Staff ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <?php  if($_SESSION['role'] == "Admin"){ ?>
        <th>Password</th>
        <th>User Level</th>
        <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <th>User Level</th>
        <?php } ?>
         
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
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175308_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_num']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_staff_gender']; ?></td>
        <td><?php echo $readrow['fld_email']; ?></td>
         <?php if($_SESSION['role'] == "Admin"){ ?>
        <td><?php echo $readrow['fld_password']; ?></td>
        <td><?php echo $readrow['fld_user_level']; ?></td>
        <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
        <td><?php echo $readrow['fld_user_level']; ?></td>
        <?php } ?>
        
        <td>
          <?php  if($_SESSION['role'] == "Admin"){ ?>
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php } if($_SESSION['role'] == "Normal Staff"){ ?>
            <a  class="btn btn-success btn-xs" onclick="return confirm('You do not have right to update staff');" disabled role="button">Edit</a>
          <a onclick="return confirm('You do not have right to delete staff');" class="btn btn-danger btn-xs" disabled role="button">Delete</a>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175308_pt2");
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
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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