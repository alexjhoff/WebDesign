
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
    <meta name="descrition" content="">
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

<body id="page-top" class="index" style="padding:10px;">

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



<br></br><br></br><br></br>
<form name="trans8" method="post">
<h3> Transaction 8 - Show Renters with More than 1 Rental Property </h3>
    <br>
    <input type="submit" name="showRenters" value="Show Renters"/>
<br></br>
</form>

<?php
if (isset($_POST['showRenters']))
{

echo "</TR><TH>Renters with more than 1 property: </TH>";
$sql = "SELECT renterName, count(1) l FROM leaseagreement GROUP BY renterName HAVING count(1) > 1";
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
echo "<TABLE BORDER=1 style=width:40%;padding:10px;>";
echo "<TR><TH> Renter's Name </TH><TH> No. of Properties </TH>";

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

<br></br>






<form name="trans9" method="post">
<h3> Transaction 9 - Show Avg. Rent for Properties By City </h3>
    City:
    <input type="text" name="cityRent" placeholder=" i.e.  Santa Clara"/>
    <br></br>
    <input type="submit" name="AvgRent" value="Show Avg Rent"/>
<br></br>
</form>

<?php
if (isset($_POST['AvgRent']))
{

$cityRent = $_POST['cityRent'];
echo "</TR><TH>Average Rent in ".$cityRent."</TH>";
$sql = "SELECT avg(rent) FROM property WHERE city = '$cityRent'";


// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
// execute SQL query
OCIExecute($sql_statement);

// get number of columns 
$num_columns = OCINumCols($sql_statement);
echo "<BR/>";
// start results formatting
echo "<TABLE BORDER=1 style=width:40%;padding:10px;>";
echo "<TR><TH> City </TH><TH> Avg. Rent </TH>";

// format results by row
while (OCIFetch($sql_statement))
{
echo "<TR>";
echo "<TD>$cityRent</TD>";
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
