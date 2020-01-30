
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
   
    
    
    
    
    

   $CompanyType= $_POST["CompanyType"];
    $CompanyName= $_POST["CompanyName"];
      $ContactPerson= $_POST["ContactPerson"];   
       $Website= $_POST["Website"];
      $Description= $_POST["Description"];
        $TierRate= $_POST["TierRate"];
      $Notes= $_POST["Notes"];
        $SkillSel= $_POST["SkillSel"];
        
    
           try{ $sql = "INSERT INTO company (company_name, contact_person, website,description,tier_rate,notes,TypeOfCompany,Focus)
    VALUES ('".$CompanyName."', '".$ContactPerson."', '".$Website."', '".$Description."', '".$TierRate."', '".$Notes."', '".$CompanyType."', '".$SkillSel."')";
    // use exec() because no results are returned
    
               
    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  

 echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
     $_SESSION["messageReg12"] ='<div class="alert alert-success" role="alert">Added to the list</div>';
            echo $_SESSION["messageReg12"];    
}
header('Location: Companies.php');
$conn->close();
?> 



