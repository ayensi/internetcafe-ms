<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'includes/Computer.php';
$computerObj = new Computer();

${"time_pre".$_GET['pcId']} = microtime(true);
$_SESSION['time_pre'.$_GET['pcId']] = ${"time_pre".$_GET['pcId']};
$_SESSION['status'.$_GET['pcId']] = 'beingUsed';
$_SESSION['startTime'.$_GET['pcId']] = date('H:i');
$computerObj->update($_GET['pcId']);

header('location: index.php');