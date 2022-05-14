<head>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <style type="text/css">
    .iconify { width: 16px; height: 16px; }
  </style>
<script src="jquery-3.6.0.min.js"></script>
  <script >
    $(document).ready(function() {
      $("#productmenu, #customermenu,#staffmenu,#ordermenu,#searchmenu").mouseenter(function(){
        
        $(this).css("color", "#005bea" );
        $(this).css("background-color", "lightblue");
      
      
  });
      
  
  $("#productmenu, #customermenu,#staffmenu,#ordermenu,#searchmenu").mouseleave(function(){
        $(this).css("color", "initial" );
        $(this).css("background-color", "white");
  });
 });
  
  
  </script>

</head>

<nav class="navbar navbar-light " >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-weight:bold;" href="home.php">Active Sports House </a>

    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><p class="navbar-text" style="color:#337ab7; " ><?php echo "Welcome, {$_SESSION['name']}" ?></p></li>
    </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu" style="font-size: 16px;">
            <li><a href="products.php" id="productmenu"><span class="iconify" data-icon="icon-park-outline:ad-product" style="margin-right: 8px;" ></span>Products</a></li>
            <li><a href="customers.php" id="customermenu"><span class="iconify" data-icon="raphael:customer" style="margin-right: 8px;"></span>Customers</a></li>
            <li><a href="staffs.php" id="staffmenu"><span class="iconify" data-icon="si-glyph:customer-support" style="margin-right: 8px;"></span>Staffs</a></li>
            <li><a href="orders.php" id="ordermenu"><span class="iconify" data-icon="icon-park-outline:order" style="margin-right: 8px;" ></span>Orders</a></li>
            <li><a href="search.php" id="searchmenu"><span class="iconify" data-icon="bx:bx-search" style="margin-right: 8px;" ></span>Search</a></li>
          </ul>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="margin-right: 4px;"></span>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>