<pre>
<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
//ini_set("memory_limit","1024M");
//print_r($_FILES['photo']);
print_r($_POST);
//print_r($_POST['photo']);
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }
class User {
    public $name = "";
    public $email  = "";
    public $handle = "";
	public $imagepath;
	public $password;
public $dob ="";
public $gender ="";
}
 try 
	{
		//This is the directory where images will be saved 
        // $target = "userdata/"; 
        // $target = $target.basename($_FILES['photo']['name']); 
		 $c = uniqid (rand (),true);
		 $ext = pathinfo($_FILES['photo']['name']);
		 echo $ext;
		 $extn = $ext['extension'];
		 $c = $c .".".$extn;
		 if(move_uploaded_file($_FILES['photo']['tmp_name'],$c)) 
		 { 
		 //Tells you if its all ok 
		 echo "Image ". $_FILES['photo']['name']."has been uploaded to http://icards.azurewebsites.net/".$c; 
		 } 
		 else { 
		 //Gives and error if its not 
		 echo "Sorry, there was a problem uploading your file."; 
		 echo "<br>".$_FILES['photo']['error'];
		 } 
		 $user = new User();
		 //echo $_FILES["photo"]["name"];
		  $user->name = $_POST["name"];
		  $user->email  = $_POST["email"];
		  $user->handle  = $_POST["handle"];
		  $user->imagepath = $c;
		  $user->password=$_POST["pwd"];
		  $user->gender=$_POST["gender"];
		  $user->dob=$_POST["dob"];
		  $string=json_encode($user);
		  echo $string;
		  echo "<br>";
		  $insert = "INSERT into cbit(handle,object) VALUES (?,?)";
		  $stmt=$conn->prepare($insert);
		  $stmt->bindValue(1,$_POST["handle"]);
		  $stmt->bindValue(2,$string);
		  $stmt->execute();
		  echo "<br>inserted data";
		  //Writes the photo to the server 
		
    }
    catch(Exception $e)
    {
        //die( mssql_POST_last_message());
		die(var_dump($e));
		if($e->getCode()==23000)//code for primary key 23000
		{
		echo "primary key voilation :(";
		}
    }
    ?>
</pre>