<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'includes/Computer.php';
$computerObj = new Computer();

$_SESSION['time_post'.$_GET['pcId']] = null;
$_SESSION['time_pre'.$_GET['pcId']] = null;
$_SESSION['est_time'.$_GET['pcId']] =null;
$_SESSION['status'.$_GET['pcId']] = 'available';
$computerObj->update($_GET['pcId']);
$_SESSION['price'.$_GET['pcId']]=null;

header('location: index.php');

?>