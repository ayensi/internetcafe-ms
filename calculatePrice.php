<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'includes/Computer.php';
$computerObj = new Computer();

${"time_post".$_GET['pcId']} = microtime(true);
$_SESSION['time_post'.$_GET['pcId']] = ${"time_post".$_GET['pcId']};
$_SESSION['est_time'.$_GET['pcId']] = ($_SESSION['time_post'.$_GET['pcId']] - $_SESSION['time_pre'.$_GET['pcId']])/60;
$_SESSION['price'.$_GET['pcId']] = $_SESSION['est_time'.$_GET['pcId']] * 0.25;
if((int) $_SESSION['price'.$_GET['pcId']] < 2 ){
    (int) $_SESSION['price'.$_GET['pcId']] = 2;
}
$_SESSION['status'.$_GET['pcId']] = 'paymentProcess';
$_SESSION['stopTime'.$_GET['pcId']] = date('H:i');
$computerObj->update($_GET['pcId']);

header('location: index.php');
?>