<?php 
	
	session_start();
	error_reporting(0);
	$order_id = $_SESSION['order_id'];
	$name = $_SESSION['name'];
	unset($_SESSION['order_id']);
	unset($_SESSION['name']);
	unset($_SESSION['cart_array']);
	
?>

<!Doctype html>
<html lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<head>
	<title>Restoran MaDdoxX</title>
	<link rel="stylesheet" href="css/main.css" />
	<script src="js/jquery.min.js" ></script>
	<script src="js/myscript.js"></script>
	<link href="./image./logo.png" rel="icon">
</head>
<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax_basket" onclick="remove_class()">
	
	<div class="parallax_head_basket">
		
		<h2>Korpa</h2>
		<h3>Rezultat</h3>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="s_summary">Uspjesna porudzbina</span></h2>
		
		<div class="order_holder">
			
			<p class="summary_p">Hvala Vam na porudzbini <?php echo $name; ?>. Vas <span>broj porudzbine</span> je: <?php echo $order_id; ?>. Nadamo se da ce porudzbina stici na vrijeme i da cete nastaviti da narucujete kod nas. Prijatno!</p>	
		</div>	
	</div>	
</div>


<div class="content" onclick="remove_class()">
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="footer_parallax" onclick="remove_class()">
	<div class="on_footer_parallax">
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>Restoran MaDdoxX</span>Copyrights</p>
	</div>
</div>

</body>

</html>