
<?php


if (session_id() == '' || !isset($_SESSION)) {

session_start();

    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "internshipdatabase";
    try{
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    $test=false;
        $numberOfItems1= 0;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT company_id,company_name,contact_person,website,description,tier_rate,notes FROM company";
$result = $conn->query($sql);
    
     
        
}
    catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage(); 
}
}
 else {
    echo "0 results";
}

    




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Internship Match Tool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="AIT_icon.ico" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="Styles.css">
        <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">
</head>

<?php include('navigation.php'); ?>
      <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Students Details</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">FILM ANIMATION GAMES<br>DIGITAL DESIGN <br>MOBILE APPLICATION DEVELOPMENT</h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>
  
<div class="container-fluid text-center">  
     <section id="about" ></section>
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <a class="text" href="Students.php" >
        <div class="well2">
     <p class="t2">Students List</p>
      </div>
       </a> 
        <a class="text">
        <div class="well1">
     <p class="t2">Students Details</p>
      </div>
       </a> 
        
          <a class="text" href="Students_new.php">
        <div class="well2">
     <p class="t2">New Student</p>
      </div>
       </a> 
        
    </div>
    <div class="col-sm-10 text-left content"> 
        
        
        <?php 
        
           if(isset($_SESSION["stuId"])){
        
        ?>
        
        
        
      <table id="myTable" style="width:100%">
  <tr class="rowhead">
   <th class="colhead">first name</th>
    
    <th class="colhead">last name</th>
     <th class="colhead">dob</th>    
                <th class="colhead">email</th>
                    <th class="colhead">notes</th>
                 <th class="colhead">student id</th>
        <th class="colhead">Course</th>
       <th class="colhead">Skills</th>
  </tr>
  
    
    
    
     <?php 

         
          
          
          
       
          
                $session12=$_SESSION["stuId"];
    $sql = "SELECT * FROM students";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["s_id"]== $session12){
           
         ?>
            
            
            
            
            <tr>
           <td class="colhead1"><?php echo $row["first_name"];?>
               </td>
             <td class="colhead1">
          <?php echo $row["last_name"];?></td>   
                 <td class="colhead1">
          <?php echo $row["dob"];?></td> 
              <td class="colhead1">
          <?php echo $row["email"];?></td>   
        <td class="colhead1">
          <?php echo $row["notes"];?></td>
                 <td class="colhead1">
          <?php echo $row["student_id"];?></td>
                <td class="colhead1">
          <?php echo $row["courses"];?></td>
        <td class="colhead1">
          <?php echo $row["Skill"];?></td>
               
            
            </tr>
            
            
            
  
        <?php }}?>
    
 
</table>
        
         <h2>Tech stack</h2>
         <table id="myTable" style="width:100%">
  <tr class="rowhead">
   
    
    <th class="colhead">Tech skill</th>
     <th class="colhead">Coding Ability</th>    
                <th class="colhead">Social ability</th>
      <th class="colhead">Punctuality_Reliability</th>
        <th class="colhead">Team Dynamics</th>
      <th class="colhead">Job Ready Professionalism</th>
      <th class="colhead">Hardworking</th>
      
  </tr>
  
    
    
    
     <?php 
 
       $session12=$_SESSION["stuId"];
             
    $sql = "SELECT * FROM student_assets";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["student_id"]== $session12){
           
         ?>
            
            
            
            
            <tr>
                <form action="Students_details_edit_ap.php" method=post>
           <td ><input type="number" name="tech_skill" value="<?php echo $row["tech_skill"];?>">            
               </td>
                    <td ><input type="number" name="coding_ability" value="<?php echo $row["coding_ability"];?>">            
               </td>
                
                 <td ><input type="number" name="social_ability" value="<?php echo $row["social_ability"];?>"> 
                    
               </td>
                
             <td><input type="number" name="punctuality_reliability" value="<?php echo $row["punctuality_reliability"];?>">
          </td>   
                 <td><input type="number" name="team_dynamics" value="<?php echo $row["team_dynamics"];?>">
         </td> 
                    
          <td><input type="number" name="job_ready_professionalism" value="<?php echo $row["job_ready_professionalism"];?>">
          </td>
                    
                  <td><input type="number" name="hardworking" value="<?php echo $row["hardworking"];?>">
          </td>
               
                    
                    
                    <td><input type="submit" value="Edit Ts"  
        ></td>
                    
                    
            </form>
            </tr>
            
            
            
  
        <?php }} ?>
    
 
</table>
        
        <h2>Enrollments</h2>
         <table id="myTable" style="width:100%">
  <tr class="rowhead">
   
    
    <th class="colhead">Start date</th>
     <th class="colhead">end date</th>    
                <th class="colhead">student id</th>
                  <th class="colhead">status</th>
      
  </tr>
  
    
    
    
     <?php 
 
         $session14= $_SESSION["stuId"];
             
    $sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["student_id"]== $session14){
           
         ?>
            
            
            
            
            <tr>
           <td ><?php echo $row["start_date"];?>
               </td>
             <td>
          <?php echo $row["end_date"];?></td>   
                 <td>
          <?php echo $row["student_id"];?></td> 
             <td>
          <?php echo $row["status"];?></td> 
        
               
            
            </tr>
            
            
            
  
        <?php }} ?>
    
 
</table>
        <?php }
          else{
              
              
              
          ?> <P style="color:black;text-align:center;">Please select a student inorder to view their details</P> <?php
               
          }
          
          
          ?>
        
        
    </div>
    
  </div>
</div>

 <footer id="sticky-footer" class="footer12">
    <div class="container text-center">
     <P>By Pedro Ferraz 6008 and Jayme Schmid 6290</P>
    </div>
  </footer>
     <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>
</body>
</html>