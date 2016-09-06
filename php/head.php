<?php
session_start();
global $page;
global $logged;
?>
<html>
<head>
<meta charset=utf-8>
<title><? echo "$title"?></title>
	<link href="img/favicon.png" rel="shortcut icon" type="image/x-icon" />	
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<script src="/video/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/video/style/style.css">
<link rel="stylesheet" type="text/css" href="/video/style/mstyle.css">
<link rel="stylesheet" type="text/css" href="/video/style/st_menu.css">
<link rel="stylesheet" type="text/css" href="/video/style/net.css">
</head>
<body>
	<? include_once('php/menu.php'); //Вкладываем меню ?>	
<div id="cont">
<!--CONTEINER-->
