<style media="screen">
body {
margin: 0;
padding: 0;
}

footer{
position: inherit;
bottom: 0;
}
.footer-distributed{
background-color: #11519b;
box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
box-sizing: border-box;
width: 100%;
text-align: left;
font: bold 16px sans-serif;

padding: 55px 50px;
margin-top: 80px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
display: inline-block;
vertical-align: top;
}

.footer-distributed .footer-left{
width: 40%;
}

.footer-distributed h3{
color:  #ffffff;
font: normal 36px 'Cookie', cursive;
margin: 0;
}

.footer-distributed h3 span{
color:  #5383d3;
}


.footer-distributed .footer-links{
color:  #ffffff;
margin: 20px 0 12px;
padding: 0;
}

.footer-distributed .footer-links a{
display:inline-block;
line-height: 1.8;
text-decoration: none;
color:  inherit;
}

.footer-distributed .footer-company-name{
color: white;
font-size: 14px;
font-weight: normal;
margin: 0;
}


.footer-distributed .footer-center{
width: 35%;
}

.footer-distributed .footer-center i{
color: #ffffff;
font-size: 25px;
width: 38px;
height: 38px;
border-radius: 50%;
text-align: center;
line-height: 42px;
margin: 10px 15px;
vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
font-size: 17px;
line-height: 38px;
}

.footer-distributed .footer-center p{
display: inline-block;
color: #ffffff;
vertical-align: middle;
margin:0;
}

.footer-distributed .footer-center p span{
display:block;
font-weight: normal;
font-size:14px;
line-height:2;
}

.footer-distributed .footer-center p a{
color: white;
text-decoration: none;;
}

.footer-distributed .footer-right{
width: 20%;
}

.footer-distributed .footer-company-about{
line-height: 20px;
color: white;
font-size: 13px;
font-weight: normal;
margin: 0;
}

.footer-distributed .footer-company-about span{
display: block;
color:  #ffffff;
font-size: 14px;
font-weight: bold;
margin-bottom: 20px;
}

.footer-distributed .footer-icons{
margin-top: 25px;
}

.footer-distributed .footer-icons a{
display: flex;
flex-direction: column;
width: 35px;
height: 35px;
cursor: pointer;
border-radius: 2px;

font-size: 20px;
color: #ffffff;
text-align: center;
line-height: 35px;

margin-right: 3px;
margin-bottom: 5px;
}
.icon-facebook{
  display: flex;
  flex-direction: row;
}
.icon-whatsapp{
  display: flex;
  flex-direction: row;
}
#facebook-cel{
  display: none;
}
#whatsapp-cel{
  display: none;
}
@media (max-width: 600px) {

.footer-distributed{
  font: bold 14px sans-serif;

}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
  display: block;
  width: 100%;
  margin-bottom: 40px;
  text-align: initial;
}

.footer-distributed .footer-center i{
  margin-left: 0;
}
  .main {
    line-height: normal;
    font-size: auto;
  }

  .icon-facebook{
    display: none;
  }
  .icon-whatsapp{
    display: none;
  }
  #facebook-cel{
    display: block;
  }
  #whatsapp-cel{
    display: block;
  }
}
</style>
<head>

</head>
	<body>
		<footer class="footer-distributed">
		  <div class="footer-left">
		    <h3>Totocalzado<span>.com</span></h3>
    		<p class="footer-links">
      		<a href="#">Inicio</a>·
      		<a href="#">Ofertas</a>·
      		<a href="#">Declaración de privacidad</a>·
    		</p>
		</div>
		<div class="footer-center">
       <div>
    		  <i class="material-icons">room</i>
    		  <p><span>Totonicapán</span>Guatemala, CA</p>
        </div>
        <div>
      		<i class="material-icons">phone</i>
      		<p>7766 2444</p>
    		</div>
  		<div>
    		<i class="material-icons">email</i>
    		<p><a href="">totocalzado.toto@gmail.com</a></p>
  		</div>
      <div id="facebook-cel">
        <i>
          <img
          src="<?=$base_url?>/recursos/img/facebook-icon.png"
          alt=""
          style="width:24px; height: 24px; margin: 0 0 7px 7px"
          >
        </i>
        <p><a href="">Totocalzado</a></p>
      </div>
      <div id="whatsapp-cel">
        <i>
          <img
            style="width:24px; height: 24px; margin: 0 0 7px 7px"
            src="<?=$base_url?>/recursos/img/icon-whatsapp.png"
            alt="whatsapp">
        </i>
        <p><a href="">+502 5746 9663</a></p>
      </div>
		</div>

		<div class="footer-right">
		<div class="footer-icons">
      <div class="icon-facebook">
        <span style="color: white;">Siguenos en</span>
        <a href="#">
          <img
            src="<?=$base_url?>/recursos/img/facebook-icon.png"
            alt=""
            style="width:24px; height: 24px; margin: 0 0 7px 27px"
            >
        </a>
      </div>
      <div class="icon-whatsapp">
        <span style="color: white;">+502 5746 9663</span>
        <img
        style="width:24px; height: 24px; margin: 0 0 7px 7px"
        src="<?=$base_url?>/recursos/img/icon-whatsapp.png"
        alt="whatsapp">
      </div>
	  </div>
	</div><br><br>
  <p style="text-align: center"class="footer-company-name">Totocalzado &copy; <?=date("Y")?></p>
</footer>
</body>
