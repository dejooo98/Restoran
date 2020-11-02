<?php 
	
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['user'])) {
        header("location: logout.php");
    }
	
	$result = "";
	$info = "";
	$items = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['order_id'])) {
			
			$order_id = htmlentities($_POST['order_id'], ENT_QUOTES, 'UTF-8');
			
			if($order_id != "") {
				
				$arr_id = explode("_", $order_id);
				
				$id = $arr_id[0];
				
				$order = $db->query("SELECT * FROM basket WHERE id='".$id."' LIMIT 1"); 
				
				if($order->num_rows) {
					
					$row = $order->fetch_assoc();
					
					$info .= "<table class='table table-hover'>
						<thead>
							<th>Korpa_id</th>
							<th>ime</th>
							<th>adresa</th>
							<th>Email</th>
							<th>Telefon</th>
						</thead>
						<tbody>";
						
					$items .= "<table class='table table-hover'>
						<tbody>
						<tr>
							<th>Naziv jela</th>
							<th>Qty</th>
							<td></td>
						</tr>";
						
					$info .= "<tr>
								<td>ORD_$id</td>
								<td>".$row['customer_name']."</td>
								<td>".$row['address']."</td>
								<td>".$row['email']."</td>
								<td>".$row['contact_number']."</td>
							</tr>";
							
					$get_data = $db->query("SELECT * FROM items WHERE order_id='".$id."'");
					
					
					while($data = $get_data->fetch_assoc()) {
						
						$items .= "<tr>
										<td>".$data['food']."</td>
										<td>".$data['qty']."</td>
										<td></td>
									</tr>";
						
					}
					
					$items .= "<tr>
									<th>Ukupna cjena</th>
									<th>".$row['total']."</th>
									<th></th>
								</tr>
								";
					
					if($row['status'] == "pending") {
						
						$items .= "<tr>
									<th>Status</th>
									<td>
										<select onChange=\"change_stat('".$id."')\" name='status' id='".$id."' class='form-control'>
											<option value='pending_$id' selected>U pripremi</option>
											<option value='confirmed_$id'>Spremno</option>
										</select>
									</td>
									<th></th>
								</tr>";
						
					}else{
						
						$items .= "<tr>
									<th>Status</th>
									<td>
										<select onChange=\"change_stat('".$id."')\" name='status' id='".$id."' class='form-control'>
											<option value='pending_$id' >pending</option>
											<option value='confirmed_$id' selected>confirmed</option>
										</select>
									</td>
									<th></th>
								</tr>";
						
					}
					
					$result = $info ."".$items;
					
					 echo $result;
					
				}
				
			}
			
		}elseif(isset($_POST['status'])) {
			
			$status = htmlentities($_POST['status'], ENT_QUOTES, 'UTF-8');
			
			if($status != "") {
				
				$stat_arr = explode("_", $status);
				
				$stat_id = $stat_arr[1];
				$stat_name = $stat_arr[0];
				
				$update = $db->query("UPDATE basket SET status='".$stat_name."' WHERE id='".$stat_id."' LIMIT 1");
				
				if($update) {
					
					echo "Status promjenjen u: $stat_name";
					
				}
				
			}
			
		}
		
	}
	
?>