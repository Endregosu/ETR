<?php
include_once("../config.php");
session_start();
$id = $_GET['id'];
$eha = $_SESSION['name'];

$stid = oci_parse($conn, "INSERT INTO FELVETTKURZUSOK values('$eha', '$id', '2','2016/17','1')");
oci_execute($stid);

header("pages/logged_in_inex.phtml");
?>
