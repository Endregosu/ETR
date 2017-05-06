<?php
$tns = "
   (DESCRIPTION =
       (ADDRESS_LIST =
           (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) )
           (CONNECT_DATA = (SID = kabinet) ) )";
 $db_username = "H452567";
 $db_password = "H452567";
 try{
     $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
 }catch(PDOException $e){
      echo ($e->getMessage());
 }
$conn = oci_connect('H452567', 'H452567', $tns,'UTF8');
?>
