<?php
session_start();

$eha = $_SESSION['name'];
require_once '../config.php';

if($_GET['action'] == 'get'){
    $stid = oci_parse($conn, "SELECT * FROM FELHASZNALOK WHERE eha='$eha'");
    oci_execute($stid);

    while ( $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $keresztnev = $row['KERESZTNEV'];
        $vezeteknev = $row['VEZETEKNEV'];
        $email = $row['EMAIL'];
        $zip = $row['IRANYITOSZAM'];
        $varos = $row['VAROS'];
        $cim = $row['CIM'];
        $oktato = $row['OKTATO'];
        $admin = $row['ADMIN'];
    }

    $json = array(
      'keresztnev' => $keresztnev,
      'vezeteknev' => $vezeteknev,
      'email' => $email,
      'zip' => $zip,
      'varos' => $varos,
      'cim' => $cim,
      'oktato' => $oktato,
      'admin' => $admin,
    );

    echo json_encode($json);

} else if ($_GET['action'] == 'update'){

    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $zip = $_REQUEST['zip'];
    $city = $_REQUEST['city'];
    $address = $_REQUEST['address'];
    $oktato = $_REQUEST['oktato'];
    $admin = $_REQUEST['admin'];

    if($oktato == 'on'){
      $oktato = 1;
    } else {
      $oktato = 0;
    }
    if($admin == 'on'){
      $admin = 1;
    } else {
      $admin = 0;
    }
    $stid = oci_parse($conn, "UPDATE FELHASZNALOK SET
        jelszo = '$password',
        keresztnev = '$first_name',
        vezeteknev = '$last_name',
        email = '$email',
        iranyitoszam = '$zip',
        varos = '$city',
        cim = '$address',
        oktato = '$oktato',
        admin = '$admin'
        WHERE eha='$eha'
    ");
    oci_execute($stid);
    echo "OK";
}
?>
