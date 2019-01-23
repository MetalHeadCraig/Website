<?php
ob_start();
session_start();
// Core Initialization
require_once '../db/connect.php';
?>

<!DOCTYPE html>
	<html lang="en">

<?php 
include 'head.php'; 
?>

	<body>

		<!--header/nav-->

		<?php include '../includes/header.php'; ?>

		<!-- Sidebar -->

		<aside>
			<?php include '../includes/sidebar.php'; ?>
		</aside>

		<!-- Page content -->
		
		<div class="content">
		
		<h1><a href="index.php">Admin portal!</a></h1>
		<div class="card shadow--3dp">