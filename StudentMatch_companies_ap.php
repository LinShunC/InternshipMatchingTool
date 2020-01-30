
 <?php
session_start();
$test=false;
if($test==false){
    $ID= $_POST["CompId"];
     $_SESSION["CompId"] =$ID;
    $Name= $_POST["CompName"];
     $_SESSION["CompName"] =$Name;
    
}



            echo $_SESSION["CompId"];  
header('Location: StudentMatch_companies_details.php');

?> 
