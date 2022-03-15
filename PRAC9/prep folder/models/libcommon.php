<?php
	if(!file_exists('./db/books.db')) {
		echo "ERROR: Database file not found.";
		exit;
	} else { $conn = new PDO('sqlite:./db/books.db'); }
?>