
 <?php






             




session_start();
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "internshipdatabase";

    
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$test= false; 

    
    
    if( $test==false){
        echo "flase";
   
    
    $newTechStack= $_POST["NewTechS"];    

    
    
    
 
    

   
        
       
        
    
           try{ $sql = "INSERT INTO techstack(skill_name)
    VALUES ('".$newTechStack."')";
    // use exec() because no results are returned
    
               
    
if ($conn->query($sql) === TRUE) {
    echo "updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
               
               
               
               
               
               
 echo "updated";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
     $_SESSION["messageReg12"] ="added";
            echo $_SESSION["messageReg12"];    
}
header('Location: Enrollments.php');
$conn->close();































?> 
