
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
   
    
    
    
    
    

    $NewCourseType= $_POST["NewCourseType"];
    $SchoolName= $_POST["SchoolName"];
      $CourseType= $_POST["CourseType"];   
       
        
    
           try{ $sql = "INSERT INTO coursetypes(courseType)
    VALUES ('".$NewCourseType."')";
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
header('Location: Enrollments_course_type.php');
$conn->close();
?> 




















?> 
