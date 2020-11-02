<?php 
	
	$db = new mysqli("localhost", "root", "", "rezervacije");
	
	if($db->connect_errno) {
		
		echo "Molimo pokusajte ponovo!";
		
	}
	
?>