

<?php
include_once 'database.php';
include_once 'login_status.php';
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
	<style>
    input[type="search"]::-webkit-search-cancel-button {
        /*Bootstrap 3 override*/
        -webkit-appearance: searchfield-cancel-button !important;
    }
</style>
</head>
<body>

	<?php include_once 'nav_bar.php'; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="page-header">
					<h2>Product Search</h2>
				</div>
				<br>

				<form   action="search_result.php" method="post">
					 <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="search" name="keyword" id="keyword" placeholder="Enter search keywords (product name or manufacturer or shirt size)"  required/>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit" name="search" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </span>
                    </div>
                </div>
			


			
					
				</form>
			</div>
		</div>

</body>
</html>