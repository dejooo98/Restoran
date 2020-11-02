<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
?>

<?php 

	if (isset($_GET['fid']) && isset($_GET['qty'])) {
		$fid = $_GET['fid'];
		$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
		$wasFound = false;
		$i = 0;
	
		if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
			$_SESSION["cart_array"] = array(0 => array("item_id" => $fid, "quantity" => $qty));
		} else {
			
			$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;
			
			foreach ($_SESSION["cart_array"] as $each_item) { 
				  $i++;
				  while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $fid) {
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $fid, "quantity" => $each_item['quantity'] + $qty)));
						  $wasFound = true;
					  } 
				  } 
			   } 
			   if ($wasFound == false) {
				   array_push($_SESSION["cart_array"], array("item_id" => $fid, "quantity" => $qty));
			   }
		}
		header("location: basket.php"); 
		exit();
	}
	
?>

<?php
	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
		unset($_SESSION["cart_array"]);
	}
	
?>



<?php 
	if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
		$key_to_remove = $_POST['index_to_remove'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$key_to_remove"]);
			sort($_SESSION["cart_array"]);
		}
	}
	
?>

<?php 
	$cartOutput = "";
	$cartTotal = "";
	$chkbtn = "";
	$empty_cart = "";
	$chkprice = "";
	$product_id_array = "";
	
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
		
		$cartOutput = "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Vasa korpa je prazna!</h3>";
		
	}else{
		
		$cartOutput = "<div class='single_order_head'>
				
							<h3>Hrana</h3>
							<h3>Cjena(N)</h3>
							<h3>Kolicina</h3>
							<h3>Ukupno</h3>
							<h3>Ukloni</h3>
							
						</div>";
						
		$i = 0;
		
		foreach ($_SESSION["cart_array"] as $each_item) { 
			$item_id = $each_item['item_id'];
			$sql = $db->query("SELECT * FROM food WHERE id='$item_id' LIMIT 1");
			while ($row = $sql->fetch_assoc()) {
				
				$foodName = $row['food_name'];
				$price = $row['food_price'];
				
			}
			$pricetotal = $price * $each_item['quantity'];
			$cartTotal = $pricetotal + $cartTotal;
			
			$x = $i + 1;
			
			$empty_cart = '<div class="empty_cart">
				
								<a href="basket.php?cmd=emptycart">Isprazni korpu</a>
								
							</div>';
			
			$chkbtn = '<div class="checkout">
				
							<a href="#" onclick="show_overlay(); return false">Potvrdi</a>
							
						</div>';
			
			$product_id_array .= "$foodName-".$each_item['quantity'].", "; 
			
			$cartOutput .= '<form style="display: inline; padding: 0; margin: 0;" action="basket.php" method="post">
			
				<div class="single_order">
					
					<p>' . $foodName . '</p>
					<p>' . $price . '</p>
					<p><select name="quantity" id="'.$item_id.'" onChange="update_qty(\''.$item_id.'\')"> 
						'.render_options($each_item['quantity'], $item_id).'
					</select></p>
					<p id="ajax_qty_'.$item_id.'">'.$pricetotal.'</p>
					<p><input name="deleteBtn' . $item_id . '" class="remove" onclick="return verify_choice();" type="submit" value="x" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></p>
					
				</div>
			
			</form>';
			
			$chkprice .= '<input type="hidden" id="chkprice" name="chkprice" value="'.$cartTotal.'" />';
			$chkfood = '<input type="hidden" id="chkfood" name="chkfood" value="'.$product_id_array.'" />';
				
			$i++; 
		}
		
		$cartTotal = '<p class="p_total"><span>Ukupno u korpi</span> : #'.$cartTotal.'</p>';
		
	}
	
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
		
		<h2>Vasa KORPA</h2>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	<div class="inner_content on_parallax">
		<h2><span class="cart">KORPA</span></h2>
		<div class="order_holder">	
			<?php echo $cartOutput; ?>	
		</div>
		<?php echo $cartTotal; ?>
		<div class="checkout_section">
			<?php echo $empty_cart; ?>
			<?php echo $chkbtn; ?>
		</div>
	</div>
</div>


<!---------KONTAKT---------->

<div class="overlay" id="overlay" onclick="hide_overlay()"></div>
	<div class="info_holder">
		<p class="close_p"><span class="close_sp" onclick="hide_overlay()"></span></p>		
		<h2><span class="tag">Zavrsite vasu narudzbinu</span></h2>		
		<form method="post" action="" onSubmit="validate_input(); return false">		
			<div class="form_group">				 
				<div class="form_group">		
					<label>Ime i prezime</label>
					<input type="text" id="name" name="name" placeholder="Unesite vase ime i prezime" required>					
				</div>				
				<div class="form_group">				
					<label>Adresa</label>
					<input type="text" id="addr"  name="addr" placeholder="Unesite vasu adresu" required>					
				</div>				
				<div class="form_group">	
					<label>Email</label>
					<input type="Email" id="email" name="email" placeholder="Unesite vas email" required>
				</div>
				<div class="form_group">
					<label>Broj telefona</label>
					<input type="text" id="phone" name="phone" placeholder="Unesite vas broj telefona" required>					
					<?php echo $chkfood; ?>					
					<?php echo $chkprice; ?>					
				</div>				
				<div class="form_group">					
					<input type="submit" class="submit" value="Poruci" />					
				</div>			
			</div>
		</form>
	</div>
</body>
</html>