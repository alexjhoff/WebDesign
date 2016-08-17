<html>
<?php
$conn=oci_connect('<username>','<password>', '//dbserver.engr.scu.edu/db11g');
if($conn) {
        print "<br> Connection to the database successful";
} else {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}

echo "<BR/>";
echo "</TR><TH>Get Customer information from Bank Database<TH>";
echo "<BR/>";

echo "</TR><TH>-- Creating SQL statement: SELECT accountno, accounttype, amount, custno FROM accounts_6<TH>";
// create SQL statement
$sql = "SELECT accountno, accounttype, amount, custno FROM accounts_6";

echo "<BR/>";
echo "</TR><TH>-- Parsing SQL statement<TH>";
// parse SQL statement
$sql_statement = OCIParse($conn,$sql);

echo "<BR/>";
echo "</TR><TH>-- Execute SQL statement<TH>";

// execute SQL query
OCIExecute($sql_statement);

// get number of columns for use later
$num_columns = OCINumCols($sql_statement);

echo "<BR/>";
echo "</TR><TH>-- Obtaining results<TH>";

// start results formatting
echo "<TABLE BORDER=1>";
echo "<TR><TH>Account No</TH><TH>Account Type</TH><TH>Amount</TH><TH>Custno</TH>";

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

// free resources and close connection
OCIFreeStatement($sql_statement);
OCILogoff($conn);

?></html>