<?php
include_once('../config.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//// -- SQL QUERY
// $stid = oci_parse($conn, 'SELECT eha FROM FELHASZNALOK WHERE eha LIKE A');
// oci_execute($stid);
$result = oci_parse($conn, "select * FROM FELHASZNALOK WHERE eha='$username' AND jelszo='$password'");
oci_execute($result);

//
while ( $row = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
    if(!empty($row)){
      session_start();
      $_SESSION['name'] = $row['EHA'];
      echo "OK";
    } else {
      echo "NOTFOUND";
    }
    // foreach ($row as $item) {
    // }
}
?>
