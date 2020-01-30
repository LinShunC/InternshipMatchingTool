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
        <link rel="shortcut icon" href="AIT_icon.ico" type="image/x-icon" />
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
        <h1 class="mx-auto my-0 text-uppercase">New Students</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">FILM ANIMATION GAMES<br>DIGITAL DESIGN <br>MOBILE APPLICATION DEVELOPMENT</h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>

    <div class="container-fluid text-center">
         <section id="about" ></section>
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <a class="text" href="Students.php">
                    <div class="well2">
                        <p class="t2">Students List</p>
                    </div>
                </a>
                <a class="text" href="Students_details.php">
                    <div class="well2">
                        <p class="t2">Students Details
                        </p>
                    </div>
                </a>

                <a class="text">
                    <div class="well1">
                        <p class="t2">New Student</p>
                    </div>
                </a>

            </div>
            <div class="col-sm-10 text-left content">

            <table id="myTable" style="width:100%">
                    <tr class="rowhead">
                        
                        <th class="colhead">First Name</th>
                        <th class="colhead">Last Name</th>
                        <th class="colhead">DOB</th>
                        <th class="colhead">Course</th>
                        <th class="colhead">Skill</th>
                        <th class="colhead">Email</th>
                        <th class="colhead">Student ID</th>

                    </tr>
                <form action="Students_new_ap.php" method=post>
                <tr class="info-row">
                            <td class="colhead2">
                    <input id="t2" type="text" name="FirstName" Placeholder="First Name">
                    </td>
                            <td class="colhead2">
                    <input id="t2" type="text" name="LastName" Placeholder="Last Name">
                    </td>
                            <td class="colhead2">
                    <input id="t3" type="date" name="dob" Placeholder="dob">
                    </td>
                            <td class="colhead2">



                    <?php
          
echo "<select  id='mySelect' name='CourseSel'>";
    
    $sql = "SELECT courseId,courseName,schoolName,courseType FROM courses";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        
        
    echo "<option value='" . $row['courseName'] . "'>" . $row['courseName'] . "</option>";
}
echo "</select>";
         
         ?>

                    <?php ?>
                                

                    </td>
                    <td class="colhead2">



                    <?php
          
echo "<select  id='mySelect' name='SkillSel'>";
     echo "<option value=''></option>";
    $sql = "SELECT * FROM techstack";
$result = $conn->query($sql);
                       
    while($row = $result->fetch_assoc()) {
        
        
    echo "<option value='" . $row['skill_name'] . "'>" . $row['skill_name'] . "</option>";
}
echo "</select>";
         
         ?>

                    <?php ?>
                                

                    </td>
                            <td class="colhead2">
                    <input id="t3" type="text" name="Email" Placeholder=" Email">
                    </td>
                            <td class="colhead2">
                            <input id="t3" type="text" name="Studentid" Placeholder="Student id">
                            </td>
                            
                        </tr>
                </table>

                <!-- another row-->
                <h6>Notes</h6>
                <textarea id="t3_notes" type="text" name="Notes" Placeholder="Notes"></textarea>
                <br><br>
                    <input type="submit" value="Add New Student">
                    <br><br>
                </form>
                <?php
        if(isset($_SESSION['messageReg12'])){
           echo $_SESSION["messageReg12"] ; 
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