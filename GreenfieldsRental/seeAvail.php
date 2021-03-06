<?php
$conn=oci_connect('anelson','DV3N9NHK6', '//dbserver.engr.scu.edu/db11g');
if($conn) {
        print "<br> Connection to the database successful. BEGIN YOUR SEARCH!";
} else {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}
session_start();
echo "<BR></BR>";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Greenfields Rental Management</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="padding:25px;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://linux.students.engr.scu.edu/~anelson/GreenfieldsRental/index.html">G R M</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://linux.students.engr.scu.edu/~anelson/GreenfieldsRental/seeAvail.php">Available Properties</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#list">List a Property</a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://linux.students.engr.scu.edu/~anelson/GreenfieldsRental/createLease.php">Create Lease</a>
                    </li>
			<li class="page-scroll">
                        <a href="http://linux.students.engr.scu.edu/~anelson/GreenfieldsRental/allTables.php">All Tables</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



<br></br><br></br>
<form name="trans1" method="post">
<h3> Transaction 1 - Search by Branch: </h3>
    Branch No.:
    <input type="text" name="searchBranch" placeholder=" i.e. b1"/>
    <br></br>
    <input type="submit" name="branchSearch" value="Search..."/>
<br></br>
</form>

<?php

echo "<BR/>";
if (isset($_POST["branchSearch"]))
{
$searchBranch = $_POST['searchBranch'];

echo "</TR><TH>Rental Properties Available under ".$searchBranch;
$sql = "SELECT * FROM property WHERE BranchNo = '$searchBranch'";
//need to only show branchno, and managers name

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns 
$num_columns = OCINumCols($sql_statement);
echo "<BR/>";
// start results formatting
echo "<TABLE BORDER=1 style=width:100%;padding:10px;>";
echo "<TR><TH> Property ID </TH><TH> SupervisorID </TH><TH> Branch No. </TH><TH> Owner </TH><TH> Street </TH><TH> City </TH><TH> Zip </TH><TH> Rooms </TH><TH>  Rent/Mo. </TH><TH> Status </TH><TH> Date Available </TH>";

// format results by row
while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";
echo "<BR/><hr>";
}

else
echo "<hr>";

?>





<form name="trans2" method="post">
    <h3> Transaction 2 </h3>
    <h3>Supervisors and Their Properties </h3>
      <br>

    <input type="submit" name="supervisors" value="Show List"/>
<br></br>
</form>

<?php
if (isset($_POST["supervisors"]))   //does isset work for when a button is clicked? no input box
{
echo "</TR><TH>Rental Properties Available by Branch</TH>";

$sql = "SELECT supervisorId, street, city, zip FROM property";
//need to only show branchno, and managers name

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns 
$num_columns = OCINumCols($sql_statement);
echo "<BR/>";
// start results formatting
echo "<TABLE BORDER=1 style=width:100%;padding:5px;>";
echo "<TR><TH> Supervisor ID</TH><TH>   Street </TH><TH> City </TH><TH> Zip Code </TH>";

// format results by row
while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";
echo "<BR/><hr>";
}

else
echo "<hr>";
?>


<form name="trans3" method="post">
<h3> Transaction 3 - Search by Owner & Branch: </h3>
    Branch No.:
    <input type="text" name="searchBranch3" placeholder=" i.e. b5"/>
    <br></br>
    Owner's Name:
    <input type="text" name="ownerName" placeholder=" i.e. John Smith"/>
    <br></br>
    <input type="submit" name="ownerSearch" value="Search..."/>
<br></br>
</form>

<?php
if (isset($_POST["ownerSearch"]))
{
echo "</TR><TH>Properties Available by Specific Owner</TH>";
$searchBranch3 = $_POST['searchBranch3'];
$ownerName = $_POST['ownerName'];

$sql = "SELECT Owner, street, city, zip, branchno FROM property WHERE BranchNo = '$searchBranch3' AND owner = '$ownerName'";
//need to only show branchno, and managers name

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns 
$num_columns = OCINumCols($sql_statement);
echo "<BR/>";
// start results formatting
echo "<TABLE BORDER=1 style=width:100%;padding:5px;>";
echo "<TR><TH> Owner </TH><TH> Street </TH><TH> City </TH><TH> Zip </TH><TH> Branch No. </TH>";

// format results by row
while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";
echo "<BR/><hr>";
}

else
echo "<hr>";
?>



<form name="trans4" method="post">
<h3> Transaction 4 - Search by City, No. of Rooms, and Rent: </h3>
    City:
    <input type="text" name="city" placeholder=" i.e. Santa Clara"/>
    Rooms: 
    <input type="text" name="Rooms" placeholder=" i.e. 2"/>
    <br><br>
    Rent:  Min
    <input type="text" name="minRent" placeholder= " 0  "/>
    - Max
    <input type="text" name="maxRent"placeholder=" 2000 "/>
    <br><br>
    <input type="submit" name="citySearch" value="Search..."/>
<br></br>
</form>

<?php
if (isset($_POST["citySearch"]))
{
$city = $_POST['city'];
$rooms = $_POST['Rooms'];
$minRent = $_POST['minRent'];
$maxRent = $_POST['maxRent'];
echo "<BR/>";
echo "</TR><TH>Rental Properties Found According to your Search</TH><BR>";
echo "</TR><TH>City: </TH>". $city. "<BR> Rooms: ".$rooms. " <BR>Rent: ".$minRent. " - ".$maxRent;


$sql = "SELECT propID, street, city, zip FROM property WHERE city = '$city' AND rooms = '$rooms'  AND rent >= '$minRent'  AND rent <= '$maxRent' AND status = 'available'";

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns for use later
$num_columns = OCINumCols($sql_statement);

echo "<BR/>";

// start results formatting
echo "<TABLE BORDER=1 style=width:100%;padding:5px;>";
echo "<TR><TH> Prop ID </TH><TH> Street </TH><TH> City </TH><TH> Zip </TH>";

// format results by row
while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
 }
echo "</TR>";
}
echo "</TABLE></BR><hr>";
}

else
echo "<hr>";
?>



<form name="trans5" method="post">
<h3> Transaction 5</h3>
<h3> No. of Properties Available By Branch</h3>

    <input type="submit" name="PropByBranch" value="Show List"/>
<br></br>
</form>

<?php
if (isset($_POST["PropByBranch"]))
{
echo "<BR/>";

$sql = "SELECT branchNo, count(*) FROM property WHERE status = 'available' GROUP BY branchNo";

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns for use later
$num_columns = OCINumCols($sql_statement);

echo "<BR/>";

// start results formatting
echo "<TABLE BORDER=1 style=width:40%;padding:5px;>";
echo "<TR><TH> BranchNo </TH><TH> No. of Properties </TH>";

// format results by row
while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
 }
echo "</TR>";
}
echo "</TABLE></BR><hr>";
}

else
echo "<hr>";

OCILogoff($conn);

?>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p><b>Santa Clara University<br>500 El Camino Real<br>Santa Clara, CA 95053</b></p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Group Members</h3>
                        <p><b>Aleisha Nelson, Alex Hoff <br>& Greg Fay</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Aleisha Nelson, Greg Fay, & Alex Hoff 2016 - COEN 178 Final Project
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
