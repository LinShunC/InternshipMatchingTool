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

$sql = "SELECT company_id,company_name,contact_person,website,description,tier_rate,notes,TypeOfCompany FROM company";
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

<body>
<?php include('navigation.php'); ?>
    <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Schools</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">FILM ANIMATION GAMES<br>DIGITAL DESIGN <br>MOBILE APPLICATION DEVELOPMENT</h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>
<div class="container-fluid text-center">
     <section id="about" ></section>
  <div class="row content">
        <div class="col-sm-2 sidenav">
      <a class="text" href="Enrollments.php">
        <div class="well2" >
     <p class="t2">Course Tech Stack</p>
      </div>
       </a> 
        <a class="text" href="Enrollments_comp.php">
                    <div class="well2">
                        <p class="t2">Company Tiers </p>
                    </div>
                </a>
         <a class="text" href="Enrollments_course_type.php" >
                    <div class="well2" >
                        <p class="t2">Courses</p>
                    </div>
                </a>
         <a class="text" href="Enrollments_course_type.php">
                    <div class="well2" >
                        <p class="t2">Course type</p>
                    </div>
                </a>
         <a class="text" href="Enrollments_schools.php">
                    <div class="well1" >
                        <p class="t2">Schools</p>
                    </div>
                </a>
        
    </div>
    <div class="col-sm-10 text-left content"> 
       <table id="myTable" style="width:100%">
                    <tr class="rowhead">
                        <th class="colhead">School  name</th>

                        <th class="colhead"></th>
                    </tr>




                  <?php 
    
    $sql = "SELECT *FROM schools";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        
            
         ?>




                    <tr  class="info-row">
                        <td class="colhead1"><?php echo $row["schoolName"];?>
                        </td>
                       
                        

                        <td>
                            <form action="Companies_details_ap.php" method=post>
                                <input type="hidden" name="CompName" value="<?php echo $row["company_name"];?>">
                                <input type="hidden" name="CompId" value="<?php echo $row["company_id"];?>">
                                <input type="image" src=".\images\info-circle-solid.svg" alt="submit" fill="orange" value="More details" width="17" height="17">

                            </form>
                        </td>

                    </tr>




                    <?php } ?>

           <tr>
           <td>
               <h4>Add a new School</h4>
               <form action="Enrollments_add_school_ap.php" method=post>
                               <p>school name</p>
                                <input type="Text" name="NewSchool" >
                   
                   
                   
                   
                   
                   
                    
                   <br>
                                <input type="submit" alt="submit" fill="orange" value="add new school" width="20" height="20">

                            </form>
               
               </td>
                <td>
                
               </td>
               
           
           
           </tr>

                </table>
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