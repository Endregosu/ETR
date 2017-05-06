<?php
require_once('pages/config.html');
require_once('config.php');
require_once('pages/header.phtml');

if(isset($_SESSION['id'])){
  require_once('pages/logged_in_index.html');
} else {
  require_once('pages/index.html');
}
?>
