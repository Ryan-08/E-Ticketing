

var loadFile = function(event) {
    var image = document.getElementById('photo-profil');
    image.src = URL.createObjectURL(event.target.files[0]);
}

var uploadFile = function (event) {
    var image = document.getElementById('upload');
    var up1 = document.getElementById('upload-1');
    var up2 = document.getElementById('upload-2');
    var gambar = document.getElementById('myImg');
    gambar.src = URL.createObjectURL(event.target.files[0]);
    
    up1.style.display = 'none';
    up2.style.display = 'block';
    image.innerHTML = event.target.files[0].name;

}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" aktif", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " aktif";
}
