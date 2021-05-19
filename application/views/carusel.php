<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 2</div>
    <img src="<?=$base_url?>/recursos/img/totocalzadoSlide1.jpg">
    <div class="text">DURABILIDAD</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 2</div>
    <img src="<?=$base_url?>/recursos/img/totocalzadoSlide2.jpg">
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
