<?php 	
ob_start();

include("include/include.inc.php");
include("include/logcheck.php");
$db = new dbic();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
<title>Sample Task</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


</head>
<body>
	<div id="wrapper">
	<div class="container">
	<?php require("include/header.php");?>
		<div id="content">
		<?php
		if(isset($_REQUEST['cmd']) && $_REQUEST['cmd']!="")
		{
			if (!file_exists(($_REQUEST['cmd'].".php")))	{
				include("404.php");
			}				
			else {
				$rurl = $_REQUEST['cmd'].".php";
				include($rurl);
			}
		}else{
			?>
			<div id="carouselExample" class="carousel slide">
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img src="assets/img/1.jpg" class="d-block w-100" alt="..." width="402" height="402">
				</div>
				<div class="carousel-item">
				<img src="assets/img/2.jpg" class="d-block w-100" alt="..." width="402" height="402">
				</div>
				<div class="carousel-item">
				<img src="assets/img/3.jpg" class="d-block w-100" alt="..." width="402" height="402">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
			</div>
			<?php
			include("list_resto.php");
			include("show_employees.php");
		}
			?>
			</div>
			
	</div>
</div>
		<?php require("include/footer.php");?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
		<script>
		jQuery(document).ready(function($) {
    		$('#tblUser').DataTable();
			} );
			</script>
</body>
</html>
<?php ob_end_flush(); ?>