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
    <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="shortcut icon" href="AIT_icon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="Styles.css">

        <!--FullCalendar css-->
        <link href='Calendar/css/core/main.min.css' rel='stylesheet' />
        <link href='Calendar/css/daygrid/main.min.css' rel='stylesheet' />

        <!-- my css for calendar-->
        <link rel="stylesheet" href="Calendar/css/custom.css">

        <!--FullCalendar js-->
        <script src='./Calendar/js/core/main.min.js'></script>
        <script src='./Calendar/js/interaction/main.min.js'></script>
        <script src='./Calendar/js/daygrid/main.min.js'></script>
        <script src='./Calendar/js/core/locales/en-au.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- js bootstrap for modal-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="./Calendar/js/custom.js"></script>
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
        <h1 class="mx-auto my-0 text-uppercase">Companies</h1>
      
        <h2 class="text-white-50 mx-auto mt-2 mb-5">FILM ANIMATION GAMES<br>DIGITAL DESIGN <br>MOBILE APPLICATION DEVELOPMENT</h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>

    <div class="container-fluid text-center">
        <section id="about" ></section>
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <a class="text">
                    <div class="well1">
                        <p class="t2">Companies List</p>
                           
                    </div>
                </a>
                <a class="text" href="Companies_details.php">
                    <div class="well2">
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

 


                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."
                    title="Type in a name">
  
                <select id="mySelect1" onchange="myFunction2()">
                    <option value="" disabled selected>Select a contact person </option>
                    <option value="0">Display all contact people</option>

                    <?php 
    
$sql = "SELECT company_id,company_name,contact_person,website,description,tier_rate,notes,TypeOfCompany FROM company";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        
            
         ?>

                    <option value="<?php echo $row["contact_person"];?>">
                        <?php echo $row["contact_person"];?></option>
                    <?php } ?>


                </select>
                <select id="mySelect" onchange="myFunction1()">
                    <option value="" disabled selected>Select a tier </option>
                    <option value="0">Display all</option>
                    <option value="1">Tier 1</option>
                    <option value="2">Tier 2</option>
                    <option value="3">Tier 3</option>
                    <option value="4">Tier 4</option>
                    <option value="5">Tier 5</option>
                </select>

                <?php
        if(isset($_SESSION['messageReg12'])){
           echo $_SESSION["messageReg12"];
           $_SESSION['time']=time();
        }
        if(time() > 1){
            session_unset();
            session_destroy();
        }
        
        ?>

                <table id="myTable" style="width:100%">
                    <tr class="rowhead">
                        <th class="colhead">Company Name</th>
                        <th class="colhead">Contact Person</th>
                        <th class="colhead">Website</th>
                        <th class="colhead">Description</th>
                        <th class="colhead">Tier rate</th>
                        <th class="colhead">Notes</th>
                        <th class="colhead">Company type</th>
                        <th class="colhead">Focus</th>
                        <th class="colhead"></th>
                    </tr>


                    <?php 
    
$sql = "SELECT * FROM company";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        
            
         ?>

                    <tr  class="info-row">
                        <td class="colhead1">
                            <b><?php echo $row["company_name"];?></b>
                        </td>
                        <td class="colhead1">
                            <?php echo $row["contact_person"];?></td>
                        <td class="colhead1">
                            <?php echo $row["website"];?></td>
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

                        <td>
                            <form action="Companies_details_ap.php" method=post>
                                <input type="hidden" name="CompName" value="<?php echo $row["company_name"];?>">
                                <input type="hidden" name="CompId" value="<?php echo $row["company_id"];?>">
                                <input  class="Image_btn" type="image" src=".\images\info-circle-solid.svg" alt="submit" fill="orange" value="More details" width="17" height="17">
                            </form>
                        </td>
                        <td>
                            <form action="Companies_drop.php" method=post>
                            <button class="Image_btn" type="button" data-toggle="modal" data-target="#myModalDelete-<?php echo $row["company_name"];?>"><img src=".\images\trash.svg" width="17" height="17"></button>
                            

<!--MODAL DELETE CONFIRMATION-->
<div class="modal" role="dialog" id="myModalDelete-<?php echo $row["company_name"];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DELETE <?php echo $row['company_name'];?>
        <input type="hidden" name="company_name" value="<?php echo $row["company_name"];?>"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete this company?
        </p>
      </div>
      <div class="modal-footer">
        
        <input class="Image_btn" type="submit" alt="submit" width="17" height="17" value="Delete">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
                           </form> 
                            <?php } ?>
                                
                        </td>
                    </tr>
                </table>
            </div>
        </div>






        

        <footer id="sticky-footer" class="footer12">
            <div class="container text-center">
                <P>By Pedro Ferraz 6008 and Jayme Schmid 6290</P>
            </div>
        </footer>

        </body>

</html>





<script>
function myFunction1() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");

    filter = document.getElementById("mySelect").value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];


        //this displays all of the results  
        if (filter == 0 || filter == "0") {
            if (td) {
                txtValue = td.textContent || td.innerText;

                tr[i].style.display = "";
                console.log("1");



            }
        } else if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                console.log("1");
            } else {
                tr[i].style.display = "none";
                console.log("2");
            }
        }
    }
}


function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");

    filter = document.getElementById("mySelect1").value.toUpperCase();
    console.log(filter);
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];


        //this displays all of the results  
        if (filter == 0 || filter == "0") {
            if (td) {
                txtValue = td.textContent || td.innerText;

                tr[i].style.display = "";
                console.log("1");



            }
        } else if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                console.log("1");
            } else {
                tr[i].style.display = "none";
                console.log("2");
            }
        }
    }
}

function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>