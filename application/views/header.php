<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/popper.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/edicion-plan.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.4.1.min.js"></script>
	<script src="<?=$base_url?>/recursos/js/sweetalert.min.js"></script>

<style media="screen">
.vertical-nav {
min-width: 17rem;
width: 17rem;
height: 100vh;
position: fixed;
top: 58px;
left: 0;
box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
transition: all 0.4s;
}
.horizontal-nav{
	position: fixed;
	right: 0px;
	left: 0px;
}
.page-content {
width: calc(100% - 17rem);
margin-left: 17rem;
transition: all 0.4s;
}

/* for toggle behavior */

#sidebar.active {
margin-left: -17rem;
}

#content.active {
width: 100%;
margin: 0;
}

@media (max-width: 768px) {
	#sidebar {
	  margin-left: -17rem;
	}
	#sidebar.active {
	  margin-left: 0;
	}
	#content {
	  width: 100%;
	  margin: 0;
	}
	#content.active {
	  margin-left: 17rem;
	  width: calc(100% - 17rem);
	}
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
background: #0bf4ca ;
background: #0bf4ca ;
background: #c2dae4    ;
min-height: 100vh;
overflow-x: hidden;
}

.separator {
margin: 3rem 0;
border-bottom: 1px dashed #fff;
}

.text-uppercase {
letter-spacing: 0.1em;
}

.text-gray {
color: #aaa;
}
.sizeTableXS{
  width: 70px;
}
.sizeTable{
  width: 130px;
}
.sizeTableXL{
  width: 300px;
}
.sizeTableInventario{
  width: 800px;
}
@media (max-width: 1080px) {
	.sizeTableInventario{
	  width: 300px;
	}
	.horizontal-nav{
		position: inherit;
	}
}
</style>
