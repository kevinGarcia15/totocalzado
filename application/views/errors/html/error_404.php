<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">
body{
	margin: 0;
	background-color: #4d328c;
	font-family: 'Muli', sans-serif;
}
.header {
	align-items: center;
	background-color: #4d328c;
	color: white;
	display: flex;
	height: 100px;
	justify-content: space-between;
	top: 0px;
	width: 100%;
}
.header__img {
	margin-left: 30px;
	width: 200px;
}
.header__menu{
	margin-right: 30px;
}
.header__menu ul{
	display: none;
	list-style: none;
	padding: 0px;
	position: absolute;
	width: 100px;
	text-align: right;
	margin: 0 0 0 -14px;
}
.header__menu:hover ul, ul:hover{
	display: block;
}
.header__menu li{
	margin: 10px 0px;
}
.header__menu li a{
	color: white;
	text-decoration: none;
}
.header__menu li a:hover{
	text-decoration: underline;
}
.header__menu--profile{
	margin-right: 8px;
	display: flex;
	align-items: center;
}
.header__menu--profile img {
	margin-right: 8px;
	height: 40px;
}
.header__menu--profile p {
	margin: 0px;
	color: white;
}

.error_404{
	display:flex;
	align-items:center;
	flex-direction: column;
}
.error_404__container{
	color: white;
	padding: 60px68px40px;
	min-height: 700px;
	width: 560px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.error_404--text h1{
	font-size: 100px;
}
.error_404--text h3{
	display: flex;
	align-items: center;
	justify-content: center;    }
.animated {
	animation-duration: 2.5s;
	animation-fill-mode: both;
	animation-iteration-count: infinite;
}

@keyframes pulse {
	0% {transform: scale(1);}
	50% {transform: scale(1.1);}
	100% {transform: scale(1);}
}
.pulse {
	animation-name: pulse;
	animation-duration: 4s;
}

.footer {
	font-family: 'Muli', sans-serif;
	background-color: #4d328c;
	display: flex;
	align-items: center;
	height: 100px;
	width: 100%;
}
.footer a {
	color: white;
	cursor: pointer;
	font-size: 14px;
	padding-left: 30px;
	text-decoration: none;
}
.footer a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>


	<section class="error_404">
		<section class="error_404__container">
			<div class="error_404--text">
				<h1 class="pulse animated">ERROR 404</h1>
				<h3 class="pulse  animated">Ruta no encontrada</h3>
			</div>
		</section>
	</section>

	<footer class="footer">
		<a href="/">Términos de uso</a>
		<a href="/">Declaración de privacidad</a>
		<a href="/">Centro de ayuda</a>
	</footer>
</body>
</html>
