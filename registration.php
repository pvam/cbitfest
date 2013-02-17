<?php
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }


   $stmt1 ="Select * from cbit where handle=?";
	$prp1 = $conn->prepare($stmt1);
    if($prp1->execute(array($_GET['id'])) )
	{
		$registrant = $prp1->fetchAll();
      if(count($registrant) >0)
	   {
		echo "present";
	   }
	   else
	    echo "absent";

	}
 
?>
