 <?php
$conn=oci_connect('anelson','DV3N9NHK6', '//dbserver.engr.scu.edu/db11g');
if($conn) {
        print "<br> Connection to the database successful";
} else {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}
session_start();
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

<body id="page-top" class="index">

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
                <a class="navbar-brand" href="#page-top">G R M</a>
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




<div style="padding:50px;">
<?php
echo "<BR><BR/><BR><BR/>";
// create SQL statement
$sql = "SELECT * FROM branch";

// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns for use later
$num_columns = OCINumCols($sql_statement);

echo "<BR/>";
echo "</TR><TH>-- Branches --<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH>BranchNo</TH><TH>Phone</TH><TH>Street</TH><TH>City</TH><TH>Zip</TH>";

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


// create SQL statement
$sql1 = "SELECT * FROM property";

// parse SQL statement
$sql1_statement = OCIParse($conn,$sql1);

echo "<BR/>";
// execute SQL query
OCIExecute($sql1_statement);

// get number of columns for use later
$num_columns1 = OCINumCols($sql1_statement);

echo "<BR/>";
echo "</TR><TH>-- Properties --<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH> PropID </TH><TH> Supervisor ID </TH><TH> Branch </TH><TH> Owner </TH><TH> Street </TH><TH> City </TH><TH> Zip </TH><TH> Rooms </TH><TH> Rent </TH><TH> Status </TH><TH> Date Available </TH>";

// format results by row
while (OCIFetch($sql1_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns1; $i++) {
    $column_value1 = OCIResult($sql1_statement,$i);
    echo "<TD>$column_value1</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";


// create SQL statement
$sql2 = "SELECT * FROM Employees";

// parse SQL statement
$sql2_statement = OCIParse($conn,$sql2);

echo "<BR/>";
// execute SQL query
OCIExecute($sql2_statement);

// get number of columns for use later
$num_columns2 = OCINumCols($sql2_statement);

echo "<BR/>";
echo "</TR><TH>-- Employees --<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH> BranchNo </TH><TH> EmpID </TH><TH> Name </TH><TH> Phone Number </TH><TH> Role </TH><TH> Date of Hire </TH>";

// format results by row
while (OCIFetch($sql2_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns2; $i++) {
    $column_value2 = OCIResult($sql2_statement,$i);
    echo "<TD>$column_value2</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";


// create SQL statement
$sql3 = "SELECT * FROM owner";

// parse SQL statement
$sql3_statement = OCIParse($conn,$sql3);

echo "<BR/>";
// execute SQL query
OCIExecute($sql3_statement);

// get number of columns for use later
$num_columns3 = OCINumCols($sql3_statement);

echo "<BR/>";
echo "</TR><TH>--Owners --<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH> Name </TH><TH> Address </TH><TH> Phone </TH>";

// format results by row
while (OCIFetch($sql3_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns3; $i++) {
    $column_value3 = OCIResult($sql3_statement,$i);
    echo "<TD>$column_value3</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";



// create SQL statement
$sql4 = "SELECT * FROM leaseAgreement";

// parse SQL statement
$sql4_statement = OCIParse($conn,$sql4);

echo "<BR/>";
// execute SQL query
OCIExecute($sql4_statement);

// get number of columns for use later
$num_columns4 = OCINumCols($sql4_statement);

echo "<BR/>";
echo "</TR><TH>-- Lease Agreements --<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH> Lease ID </TH><TH> Prop ID </TH><TH> Renter Name </TH><TH> Home Phone </TH><TH> Work Phone </TH><TH> Friend </TH><TH> Friend's Phone </TH><TH> Start Date </TH><TH> End Date </TH><TH> Deposit  </TH><TH> Rent/Mo. </TH>";

// format results by row
while (OCIFetch($sql4_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns4; $i++) {
    $column_value4 = OCIResult($sql4_statement,$i);
    echo "<TD>$column_value4</TD>";
 }
echo "</TR>";
}
echo "</TABLE>";
echo "<br></br>";
OCIFreeStatement($sql_statement);
OCILogoff($conn);

?>
</div>  <!--end of text align center div for php tables-->
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
