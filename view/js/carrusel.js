document.addEventListener('DOMContentLoaded', MostrarSlides, false);
document.addEventListener('DOMContentLoaded', fotosautomatico, false);
let slideIndex = 1;
MostrarSlides(slideIndex);

function MoverSlides(n) {
  MostrarSlides(slideIndex += n);
  console.log(slideIndex)
}

  //Cambia imagenes cada 5 segundos
  function fotosautomatico(){
  setInterval( pruebas, 5000);
function pruebas(){
  MostrarSlides(slideIndex += 1);
}
  }


function MostrarSlides(n) {
  
  
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (slides.length != 0) {
    if (n > slides.length) {
      slideIndex = 1
    }    
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block"; 
  }
}