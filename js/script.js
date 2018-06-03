var slideIndex = 0;
smenjivanjeSlika();

function smenjivanjeSlika() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(smenjivanjeSlika, 3000); //menja sliku na svake 3 sekunde
}
