<html>
<?php
$conn=oci_connect('ahoff','', '//dbserver.engr.scu.edu/db11g');
if($conn) {
        print "<br> connection successful";
} else {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}
OCILogoff($conn);
?>
</html>