<?php
session_start();
$id = session_id();

require_once('../pages/config.html');
require_once('../config.php');
require_once('../pages/header.phtml');
require_once('../pages/logged_in_index.phtml');
?>
