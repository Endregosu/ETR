<?php
require_once('../pages/config.html');
require_once('../config.php');
require_once('../pages/header.phtml');

if(!isset($_GET['reg'])){
  require_once('../pages/registration.html');
} else {

// EHA GENERALAS - WAAT.SZE - vel ----------------------------------------------

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $last_name = str_replace(array('á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ö', 'Ő', 'ú', 'Ú', 'ű', 'Ű'), array('a', 'a', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u'), $last_name);
  $first_name = str_replace(array('á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ö', 'Ő', 'ú', 'Ú', 'ű', 'Ű'), array('a', 'a', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u'), $first_name);
  $last_name = strtoupper($last_name);
  $first_name = strtoupper($first_name);
  $eha = substr($first_name,0,2);
  $eha .= substr($last_name,0,1);
  $eha .= "WAAT.SZE";

// Jogosultsag radio button  ---------------------------------------------------

  if(isset($_POST['optradio1'])){
      $optradio1 = 1;
  } else {
      $optradio1 = 0;
  }
  if(isset($_POST['optradio2'])){
      $optradio2 = 1;
  } else {
      $optradio2 = 0;
  }

// INSERT QUERY ----------------------------------------------------------------

  // $result = oci_parse($conn, "INSERT INTO FELHASZNALOK VALUES(
  // $eha,
  // $_POST['password'],
  // $_POST['last_name'],
  // $_POST['first_name'],
  // $_POST['email'],
  // CURRENT_DATE,
  // $_POST['zip'],
  // $_POST['city'],
  // $_POST['address'],
  // $optradio1,
  // $optradio2,
  // )");
  // oci_execute($result);

// REGISTRATION SUCCES----------------------------------------------------------
    require_once('../pages/registration_succes.phtml');
}
?>
