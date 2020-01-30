
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
    $session12=$_SESSION["stuId"];
   $student_id=  $session12;
    $tech_skill= $_POST["tech_skill"];    
    $coding_ability= $_POST["coding_ability"];
 $social_ability= $_POST["social_ability"];
    $punctuality_reliability= $_POST["punctuality_reliability"];    
    $team_dynamics= $_POST["team_dynamics"];
 $job_ready_professionalism= $_POST["job_ready_professionalism"];
  $hardworking= $_POST["hardworking"];  
        
    
           try{ $sql = "UPDATE student_assets
SET tech_skill = '".$tech_skill."', coding_ability= '". $coding_ability."',social_ability = '".$social_ability."', punctuality_reliability= '". $punctuality_reliability."',team_dynamics = '".$team_dynamics."', job_ready_professionalism= '". $job_ready_professionalism."',hardworking = '".$hardworking."'
WHERE student_id = '".$student_id."';
   ";
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
header('Location:Students_details.php');
$conn->close();































?> 
