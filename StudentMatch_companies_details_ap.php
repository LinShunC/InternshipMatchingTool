
 <?php

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
   
    
    
    
    
    

    $startD= $_POST["startD"];
       $endD= $_POST["endD"];
         $studentId= $_POST["studentId"];
       $companyName= $_POST["companyName"];  
        $status="inprogress";
            
            
        
   
       
        
    
           try{ $sql = "INSERT INTO enrollment(company_name,start_date,end_date,student_id,status)
    VALUES ('".$companyName."','".$startD."','".$endD."','".$studentId."','".$status."')";
    // use exec() because no results are returned
    
               
    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
               
    
    // use exec() because no results are returned
    
         
               
               
               
               

               
               
               
               
               
 echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     $_SESSION["messageReg12"] ="added";
            echo $_SESSION["messageReg12"];    
}
header('Location: studentMatch_companies_details.php');
$conn->close();
?> 




















?> 