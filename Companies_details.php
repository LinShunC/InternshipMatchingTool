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
        <h1 class="mx-auto my-0 text-uppercase">Company Details</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">FILM ANIMATION GAMES<br>DIGITAL DESIGN <br>MOBILE APPLICATION DEVELOPMENT</h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>
    <div class="container-fluid text-center">
         <section id="about" ></section>
        <div class="row content">
            <div class="col-sm-2 sidenav">
                
                <a class="text" href="Companies.php">
                   
                    <div class="well2">
                        <p class="t2">Companies List</p>
                    </div>
                </a>
                <a class="text">
                    <div class="well1">
                        <p class="t2">Company Details </p>
                    </div>
                </a>

                <a class="text" href="Companies_new.php">
                    <div class="well2">
                        <p class="t2">New company</p>
                    </div>
                </a>

            </div>
            <div class="col-sm-10 text-left content">

                <?php 
        
           if(isset($_SESSION["CompId"])){
        
        ?>

                <table id="myTable" style="width:100%">
                    <tr class="rowhead">
                        <th class="colhead">Company Name</th>

                        <th class="colhead">Contact Person</th>
                        <th class="colhead">website</th>
                        <th class="colhead">Description</th>
                        <th class="colhead">Tier rate</th>
                        <th class="colhead">notes</th>
                         <th class="colhead">company type</th>
<th class="colhead"> focus</th>
                    </tr>




                    <?php 
  $session12=$_SESSION["CompId"];
         
    $sql = "SELECT * FROM company";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["company_id"]== $session12){
           
         ?>

                    <tr class="info-row">
                        <td class="colhead1">
                            <?php echo $row["company_name"];?>
                        </td>

                        <td class="colhead1">
                            <?php echo $row["contact_person"];?>
                        </td>

                        <td class="colhead1">
                            <?php echo $row["website"];?>
                        </td>
                        <td class="colhead1">
                            <?php echo $row["description"];?></td>
                        <td class="colhead1">
                            <?php echo $row["tier_rate"];?></td>
                        <td class="colhead1">
                            <?php echo $row["notes"];?></td>
                                                <td class="colhead1">
                            <?php echo $row["TypeOfCompany"];?></td>
                        <td class="colhead1">
                            <?php echo $row["Focus"];?></td>

                    </tr>




                    <?php }} ?>

                </table>

                <h6>Vacancies</h6>
                <table id="myTable" style="width:100%">
                    <tr class="rowhead">


                        <th class="colhead">Vacancy name</th>
                        <th class="colhead">salary</th>
                        <th class="colhead">vacancy status</th>


                    </tr>




                    <?php 
 
         $session13=$_SESSION["CompId"];
             
    $sql = "SELECT * FROM vacancies";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["company_id"]== $session13){
           
         ?>




                    <tr>
                        <td><?php echo $row["vacancy_name"];?>
                        </td>
                        <td>
                            <?php echo $row["salary"];?></td>
                        <td>
                            <?php echo $row["vacancy_status"];?></td>




                    </tr>




                    <?php }} ?>


                </table>

                <h6>Enrollments</h6>
                <table id="myTable" style="width:100%">
                    <tr class="rowhead">


                        <th class="colhead">Start date</th>
                        <th class="colhead">end date</th>
                        <th class="colhead">student id</th>
                        <th class="colhead">status</th>

                    </tr>




                    <?php 
 
         $session14= $_SESSION["CompName"];
             
    $sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["company_name"]== $session14){
           
         ?>




                    <tr>
                        <td><?php echo $row["start_date"];?>
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
              
              
              
          ?> <P style="color:black;text-align:center;">Please select a company inorder to view their details</P> <?php
               
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