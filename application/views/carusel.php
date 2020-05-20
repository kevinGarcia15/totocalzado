<style media="screen">
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
width: 100%;
height: 400px;
position: relative;
margin: auto;
overflow: hidden;
}
.slideshow-container img{
  width: 100%;
  height: 600px;
  overflow: hidden;
}

/* Hide the images by default */
.mySlides {
display: none;
}

/* Next & previous buttons */
.prev, .next {
cursor: pointer;
position: absolute;
top: 50%;
width: auto;
margin-top: -22px;
padding: 16px;
color: white;
font-weight: bold;
font-size: 18px;
transition: 0.6s ease;
border-radius: 0 3px 3px 0;
user-select: none;
}

/* Position the "next button" to the right */
.next {
right: 0;
border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
color: #fff;
text-shadow: 0px 1px 1px #000;
font-size: 75px;
padding: 8px 12px;
position: absolute;
bottom: 8px;
width: 100%;
text-align: center;
font-weight: 800;
font-family: "Bitsumishi" !important;

}

/* Number text (1/3 etc) */
.numbertext {
color: #f2f2f2;
font-size: 12px;
padding: 8px 12px;
position: absolute;
top: 0;
}

/* The dots/bullets/indicators */
.dot {
cursor: pointer;
height: 15px;
width: 15px;
margin: 0 2px;
background-color: #bbb;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}

.active, .dot:hover {
background-color: #717171;
}

/* Fading animation */
.fade {
-webkit-animation-name: fade;
-webkit-animation-duration: 3s;
animation-name: fade;
animation-duration: 3s;
}

@-webkit-keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

@media only screen and (max-width: 600px) {
  .slideshow-container {
  width: 100%;
  height: 200px;
  }
  .slideshow-container img{
    width: 100%;
    height: 200px;
    overflow: hidden;
  }

  .text {
  font-size: 45px;
  width: 100%;
  }
}

</style>
<link href="//db.onlinewebfonts.com/c/f518e4e7999e3a3b645a9605c23e2cf6?family=Bitsumishi" rel="stylesheet" type="text/css"/>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 2</div>
    <img src="<?=$base_url?>/recursos/img/slide_1.png">
    <div class="text">DURABILIDAD</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 2</div>
    <img src="<?=$base_url?>/recursos/img/slide_2.png">
    <div class="text">BUEN PRECIO</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
</div>

<script type="text/javascript">
var slideIndex = 0;
showSlides();

function showSlides() {
var i;
var slides = document.getElementsByClassName("mySlides");
for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}
slides[slideIndex-1].style.display = "block";
setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
