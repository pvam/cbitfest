<?php
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }
            $sql_select = "SELECT * FROM cbit where handle= ?";
			$prp = $conn->prepare($sql_select);
			if($prp->execute(array($_GET['id'])) )
			{
					$registrant = $prp->fetch();
					if(count($registrant)>0)
					{
					$tmp = json_decode($registrant['object']);	
		            $password=$tmp->password;
		             echo $password;			 
		             }
	                 else
	         			echo "absent";
			}
		    else
			echo "handle does not exist";


?>
