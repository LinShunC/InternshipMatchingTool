
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
   
    
    
    
    
    

    $Courses= $_POST["CourseSel"];
    $FirstName= $_POST["FirstName"];
      $LastName= $_POST["LastName"];   
       $dob= $_POST["dob"];
      $Email= $_POST["Email"];
        $Notes= $_POST["Notes"];
      $Studentid= $_POST["Studentid"];
          $SkillSel= $_POST["SkillSel"];
       
        
    
           try{ $sql = "INSERT INTO students(first_name, last_name, dob,email,notes,student_id,courses,skill)
    VALUES ('".$FirstName."', '".$LastName."', '".$dob."', '".$Email."', '".$Notes."', '".$Studentid."', '".$Courses."', '".$SkillSel."')";
    // use exec() because no results are returned
    
               
    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
               
     $student_id="1";      
               
            try{ $sql = "SELECT s_id FROM `students` ORDER BY s_id DESC LIMIT 1 ";
    // use exec() because no results are returned
    
               
    
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $student_id=$row["s_id"];
    }
            echo $student_id;
            
           
                 try{ $sql = "INSERT INTO student_assets(student_id)
    VALUES (".$student_id.") ";
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
                
                
                
                
                
                
                
                
                
                
                
               
               
               
               
               
 echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }     
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
 echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     $_SESSION["messageReg12"] ="added";
            echo $_SESSION["messageReg12"];    
}
header('Location: Students_new.php');
$conn->close();
?> 