<?php 
	
	$db = new mysqli("localhost", "root", "", "rezervacije");
	
	if($db->connect_errno) {
		
		echo "MOLIMO PROVJERITE PODATKE KOJE STE UKUCALI I POKUSAJTE PONOVO!";
		
	}
	
?>