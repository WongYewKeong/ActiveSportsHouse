
<?php
	
include_once 'database.php';
include_once 'login_status.php';

if(isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
}
  else if (isset($_GET["page"])) {
   $keyword = $_GET["key"];
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>Active Sports House Ordering System : Search</title>
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

            <!-- Modal Script -->
          <script type="text/javascript">

           function openModal(cpid){
             $('.modal-body').load('modal_details.php?pid='+cpid,function(){
                  $('#myModal').modal({show:true});
              });
           }

          </script>
</head>
<body>

	<?php include_once 'nav_bar.php'; ?>

	<div class="container-fluid">
		<div class="row">
			<br>
			<center>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<h2>Search Results</h2>
				<br>
				
			</div>
			</center>
			
		</div>
		<br><br>

	<div class="container-fluid">
      <div class="row">

        <?php
		
		    $per_page = 9;
         	if (isset($_GET["page"])) {
            	$page = $_GET["page"];
        	}
          	else {
            	$page = 1;
        	}

        	$start_from = ($page-1) * $per_page;

          	try {
          	
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $keyword = trim($keyword);
            $addkey = $keyword;

			$keyword = explode(' ', $keyword);

			$i=0;
			$query = "SELECT * FROM tbl_products_a175308_pt2 WHERE ";
			foreach($keyword as $term) {
				$i++;
				if($i == '1') {
					$query .= "fld_product_name LIKE '%$term%' ";
				}
				else {
					$query .= "OR fld_product_name LIKE '%$term%'  ";
				}
			}
			//echo "$query <br>";

			$j=0;
			$query2 = "";
			foreach($keyword as $term2) {
				$j++;
				if($j == '1') {
					$query2 .= "fld_manufacturer LIKE '%$term2%' ";
				}
				else {
					$query2 .= "OR fld_manufacturer LIKE '%$term2%' ";
				}
			}
			//echo "$query2 <br>";

			$k=0;
			$query3 = "";
			foreach($keyword as $term3) {
				$k++;
				if($k == '1') {
					$query3 .= "fld_shirtsize LIKE '%$term3%' ";
				}
				else {
					$query3 .= "OR fld_shirtsize LIKE '%$term3%' ";
				}
			}
			//echo "$query3 <br>";


			$query666 = "";
			$query666 .= $query;
			$query666 .= "OR ";
			$query666 .= $query2;
			$query666 .= "OR ";
			$query666 .= $query3;

			//echo "$query666 <br>";


			$query667 = $query666;
          	$query667 .= "LIMIT $start_from, $per_page";

          	//echo "$query667 <br>";


			$stmt = $conn -> prepare($query667);
            $stmt->execute();
            $result = $stmt->fetchAll();
          	
          	}
          	catch(PDOException $e){
            	echo "Error: " . $e->getMessage();
          	}


           
           if (empty($result)){
            $message = "The product you search is not available, please find another one";
            echo "<script type='text/javascript'>alert('$message');</script>";

          }

          if (!empty($result)){

          }

          	foreach($result as $readrow) {
          	?>
            
				<div class="col-xs-12 col-sm-4 col-md-4">
              	<div class="thumbnail">
                <?php if ($readrow['fld_product_num'] == "" ) {
                  echo "No image";
                }
                else { ?>
                  <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" alt="image" style="width: 200px; height: 200px; object-fit: contain;">
                <?php } ?>
                <div class="caption">
                  <strong><p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $readrow['fld_product_name'] ?></p></strong>
                  <p>Price: RM<?php echo $readrow['fld_product_price'] ?></p>
                  <p>Manufacturer: <?php echo $readrow['fld_manufacturer'] ?></p>
                  <p>Shirt Size: <?php echo $readrow['fld_shirtsize'] ?></p>
                  <p>Department: <?php echo $readrow['fld_department'] ?></p>
                  <p>
                  	<br>
          <!-- Trigger the modal with a button -->
          <a onclick="openModal('<?php echo $readrow['fld_product_num']; ?>'); return false;" class="btn btn-primary btn-block" role="button">View Details</a>

          <!-- Modal Page-->
          <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Product Details</h4>
                      </div>
                      <div class="modal-body">

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End of Modal -->


                  </p>
                </div>
              	</div>
            	</div>
          	<?php
          	}
          		$conn = null;
          	?>
      </div>

      <div class="row">
        <center>
          <nav>
            <ul class="pagination">
            <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare($query666);
              //echo "here is aaa $query666 <br>";
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
              <li><a href="result.php?page=<?php echo $page-1 ?>&key=<?php echo $addkey ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <?php
            }
            for ($i=1; $i<=$total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"search_result.php?page=$i&key=$addkey\">$i</a></li>";
              else
                echo "<li><a href=\"search_result.php?page=$i&key=$addkey\">$i</a></li>";
            ?>
            <?php if ($page==$total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">»</span></li>
            <?php } else { ?>
              <li><a href="search_result.php?page=<?php echo $page+1 ?>&key=<?php echo $addkey ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
            <?php } ?>
            </ul>
          </nav>
        </center>
      </div>
  	</div>

</body>
</html>