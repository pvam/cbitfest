<?php

try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }
   $check=false;
   
   $stmt1 ="Select * from cbit where handle=?";
 $prp1 = $conn->prepare($stmt1);
  if($prp1->execute(array($_GET['handle'])) )
 {
  $registrant1 = $prp1->fetch();
    // print_r($registrant1);
     if(count($registrant1) >0)
      {
		  $tmp = json_decode($registrant1['object']);
		  
		  if($tmp->password==$_GET['password'])
		  {
			  $check=true;
			  print '<script>';
		      print'alert("Success!!cool!!")';
		      print '</script>';
		  }
		  else
		  {
			  print '<script>';
		      print'alert("Wrong password!!")';
		      print '</script>';
			  
		}
		if($check&&isset($_GET['but']))
	    {
			
            header("Location: www.google.com") ;
		}	
				  		  
      }
	  else
	  {
		print '<script>';
		print'alert("You are not registered!")';
		print '</script>';
	  }
}


?>