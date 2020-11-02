<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	
	$bfast = "";
	$lunch = "";
	$dinner = "";
	
	$get_recent = $db->query("SELECT * FROM food");
	
	if($get_recent->num_rows) {
		
		while($row = $get_recent->fetch_assoc()) {
			
			if($row['food_category'] == "dorucak") {
				
				$bfast .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=".$row['id']."'><img src='image/FoodPics/".$row['id'].".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>".$row['food_name']."</h4>
								<p class='desc'>".substr($row['food_description'], 0, 33)."...</p>
								<p class='price'>#".$row['food_price']."</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
				
			}elseif($row['food_category'] == "rucak") {
				
				$lunch .=	"<div class='parallax_item'>
				
							<a href='detail.php?fid=".$row['id']."'><img src='image/FoodPics/".$row['id'].".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>".$row['food_name']."</h4>
								<p class='desc'>".substr($row['food_description'], 0, 33)."...</p>
								<p class='price'>#".$row['food_price']."</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";
				
			}elseif($row['food_category'] == "vecera") {
				
				$dinner .= "<div class='parallax_item'>
				
							<a href='detail.php?fid=".$row['id']."'><img src='image/FoodPics/".$row['id'].".jpg' width='80px' height='80px' /> 
							<div class='detail'>
								
								<h4>".$row['food_name']."</h4>
								<p class='desc'>".substr($row['food_description'], 0, 33)."...</p>
								<p class='price'>#".$row['food_price']."</p>
								
							</div>
							<p class='clear'></p>
							</a>
							
						</div>";

			}
		}
	}else{
	}
?>

<!Doctype html>
	<html lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<head>
	<title>Meni</title>
	<link rel="stylesheet" href="css/main.css" />
	<script src="js/jquery.min.js" ></script>
	<script src="js/myscript.js"></script>
	<link href="./image./logo.png" rel="icon">
</head>
<body>
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		<h2>Meni RESTORAN MADDOXX</h2>
	</div>	
</div>
<div class="content" onclick="remove_class()">
	<div class="inner_content on_parallax">
		<h2><span class="fresh">Dorucak</span></h2>
		<div class="parallax_content">
			<?php echo ($bfast == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Vasa korpa je prazna</h3>" : $bfast; ?>
			<p class="clear"></p>		
		</div>	
	</div>
</div>
<div class="content" onclick="remove_class()">
	<div class="inner_content on_parallax">
		<h2><span class="fresh">Rucak</span></h2>
		<div class="parallax_content">	
			<?php echo ($lunch == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Vasa korpa je prazna</h3>" : $lunch; ?>	
			<p class="clear"></p>
		</div>
	</div>
</div>
<div class="content" onclick="remove_class()">
	<div class="inner_content on_parallax">
		<h2><span class="fresh">Vecera</span></h2>
		<div class="parallax_content">
			<?php echo ($dinner == "") ? "<h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Vasa korpa je prazna</h3>" : $dinner; ?>
			<p class="clear"></p>
		</div>
	</div>
</div>

<div class="footer_parallax" onclick="remove_class()">
	<div class="on_footer_parallax">
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>Restoran MaDdoxX</span>Copyrights</p>
	</div>
</div>
	
</body>

</html>