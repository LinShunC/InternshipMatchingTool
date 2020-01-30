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
   
        //$company_name = filter_input(INPUT_GET, "company_name", FILTER_DEFAULT);
        $company_name= $_POST["company_name"];   
        $contact_person= $_POST["contact_person"];  
        $website= $_POST["website"];  
        $description= $_POST["description"];
        $tier_rate= $_POST["tier_rate"];   
        $notes= $_POST["notes"];  
        $TypeOfCompany= $_POST["TypeOfCompany"];  
        $Focus= $_POST["Focus"];  


        
    
    try{ $sql ="DELETE FROM company WHERE company_name='".$company_name."';" ;
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
header('Location: Companies.php');
$conn->close();


?> 
