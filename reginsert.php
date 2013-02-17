<?php
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }

	   $handle = $_GET['id'];
	   $object = $_GET['object'];
	   $insert = "INSERT into cbit(handle,object) VALUES (?,?)";
		$stmt=$conn->prepare($insert);
		$stmt->bindValue(1,$handle);
		$stmt->bindValue(2,$object);
		$stmt->execute();
		echo "success";

?>
