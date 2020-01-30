
 <?php
session_start();
$test=false;
if($test==false){
    $ID= $_POST["stuId"];
     $_SESSION["stuId"] =$ID;
   
}



            echo $_SESSION["stuId"];  
header('Location: StudentMatch_Details.php');

?> 
