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
                        <a href="http://students.engr.scu.edu/~anelson/GreenfieldsRental/renters.php">Renters</a>
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


<br></br><br><br>
<form name="trans6" method="post">
<h3> Transaction 6 - Create Lease Agreement </h3>
    Lease Id:
    <input type="text" name="lease6" placeholder=" i.e.  1205..." style="margin:10px;"/>
    Property Id:
    <input type="text" name="property6" placeholder=" i.e.  p1, p2, p3..." style="margin:10px;"/>
    <br>
    Renter Name:
    <input type="text" name="renter6" placeholder=" i.e.  John Smith..." style="margin:10px;"/>
    Home Phone:
    <input type="text" name="hphone" placeholder=" i.e.  4081112222..." style="margin:10px;"/>
    Work Phone.:
    <input type="text" name="wphone" placeholder=" i.e.  4082223333..." style="margin:10px;"/>
    <br>
    Friends Name:
    <input type="text" name="friend" placeholder=" i.e.  Jane Doe..." style="margin:10px;"/>
    Friend Phone:
    <input type="text" name="fphone" placeholder=" i.e.  4083334444..." style="margin:10px;"/>
    <br>
    Start Date:
    <input type="text" name="sDate" placeholder=" i.e.  2016-01-01..." style="margin:10px;"/>
    End Date:
    <input type="text" name="eDate" placeholder=" i.e.  2017-01-01..." style="margin:10px;"/>
    <br>
    Deposit: $
    <input type="text" name="deposit" placeholder=" i.e.  4000..." style="margin:10px;"/>
    Rent: $
    <input type="text" name="rent" placeholder=" i.e.  5000..." style="margin:10px;"/>
    <br></br>
    <input type="submit" name="createLease" value="Create Lease"/>
<br></br>
</form>

<?php
if (isset($_POST["createLease"]))
{
$lease6 = $_POST['lease6'];
$property6 = $_POST['property6'];
$renter6 = $_POST['renter6'];
$hphone = $_POST['hphone'];
$wphone = $_POST['wphone'];
$friend = $_POST['friend'];
$fphone = $_POST['fphone'];
$sDate = $_POST['sDate'];
$eDate = $_POST['eDate'];
$deposit = $_POST['deposit'];
$rent = $_POST['rent'];

$sql1 = "INSERT INTO leaseAgreement VALUES('$lease6','$property6','$renter6','$hphone','$wphone','$friend','$fphone',date'$sDate',date'$eDate','$deposit','$rent')";
$sql = "SELECT * FROM leaseAgreement WHERE leaseId = '$lease6'";
//need to only show branchno, and managers name

// parse SQL statement
$sql1_statement = OCIParse($conn,$sql1);
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql1_statement);
OCIExecute($sql_statement);

// get number of columns 
$num_columns = OCINumCols($sql_statement);
echo "<BR/>";
// start results formatting
echo "<TABLE BORDER=1 style=width:100%;padding:10px;>";
echo "<TR><TH> Lease ID </TH><TH> Property ID </TH><TH> Renter </TH><TH> Home Phone </TH><TH> Work Phone </TH><TH> Friend </TH><TH> Friend Phone </TH><TH> Start Date </TH><TH>  End Date </TH><TH> Deposit </TH><TH> Rent </TH>";

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

<form name="trans7" method="post">
<h3> Transaction 7 - Show Lease Agreement for a Renter </h3>
    Renter's Name:
    <input type="text" name="renterName" placeholder=" i.e.  Aleisha Nelson"/>
    <br></br>
    <input type="submit" name="showLease" value="Show Lease"/>
<br></br>
</form>

<?php
if (isset($_POST["showLease"]))
{

$renterName = $_POST['renterName'];
echo "</TR><TH>LEASE AGREEMENT FOR".$renterName."</TH>";
$sql = "SELECT * FROM LeaseAgreement WHERE renterName = '$renterName'";
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


<form name="trans10" method="post">
<h3> Transaction 10 - Show Leases that will expire in the next two months </h3>
    <br>
    <input type="submit" name="expiredLeases" value="Show Leases"/>
<br></br>
</form>

<?php
if (isset($_POST["expiredLeases"]))
{

echo "</TR><TH>Lease Agreements that expire in the next two months: </TH>";
$sql = "select renterName, street, city, zip, endDate FROM property A INNER JOIN leaseagreement B ON B.propID = A.propId";
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
echo "<TR><TH> Renter's Name </TH><TH> Street </TH><TH> City </TH><TH> Zip </TH><TH> Expiration Date </TH>";

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