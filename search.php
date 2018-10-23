<?php
	include("db-contact.php");
	include("EventNews.php");
	error_reporting(0);
	$output = '';


	if (isset($_POST['search2'])) {
		$searchq = $_POST['search2'];

		$query = mysql_query("SELECT * FROM event WHERE eventName LIKE '%$q%'");
		$count = mysql_num_rows($query);
		if ($count == 0) {
			$output = 'GG';
		} else{
			While($row = mysql_fetch_array($query)){
				$eName = $row['eventName'];
				
				$output = '.$eName.';
			}
		}
	}
	
	
	print("$output");
?>
