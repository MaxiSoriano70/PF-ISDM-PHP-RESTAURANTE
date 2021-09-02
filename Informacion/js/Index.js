/*guardamos en una variable el html co la clase de img.galeria,agregar-imagen,imagen-light y close*/
const imagenes = document.querySelectorAll('.img-galeria');
const imagenLight = document.querySelector('.agregar-imagen');
const contenedorLight = document.querySelector('.imagen-light');
const closeLight = document.querySelector('.close');
/*guardamos en una variable el html co la clase de hamburguer*/
const hamburguer1 = document.querySelector('.hamburguer');

/*vamos a recorrer las imagenes*/
imagenes.forEach(imagen=>{
 /*Cuando agan click en una imagen*/
 imagen.addEventListener('click',()=>{
 /*Esto nos permite tener la ruta de la imagen y enviamos a la fuction aparecer imagen*/
 aparecerImagen(imagen.getAttribute('src'));
 })
})

/*Funcion para cerrar*/
contenedorLight.addEventListener('click',(e)=>{
 if (e.target!==imagenLight){
  contenedorLight.classList.toggle('show');
  imagenLight.classList.toggle('showImage');
 }
})

/*funcion de aparecer imagen*/
const aparecerImagen=(imagen)=>{
 imagenLight.src=imagen;
 contenedorLight.classList.toggle('show');
 imagenLight.classList.toggle('showImage');
}

const backToTopButton = document.querySelector("#back-to-top-btn");

window.addEventListener("scroll", scrollFunction);

function scrollFunction() {
 if (window.pageYOffset > 300) {
  if(!backToTopButton.classList.contains("btnEntrance")) {
   backToTopButton.classList.remove("btnExit");
   backToTopButton.classList.add("btnEntrance");
   backToTopButton.style.display = "block";
  }
 }
 else {
  if(backToTopButton.classList.contains("btnEntrance")) {
   backToTopButton.classList.remove("btnEntrance");
   backToTopButton.classList.add("btnExit");
   setTimeout(function() {
     backToTopButton.style.display = "none";
   }, 250);
  }
 }
}

backToTopButton.addEventListener("click", smoothScrollBackToTop);

function smoothScrollBackToTop() {
 const targetPosition = 0;
 const startPosition = window.pageYOffset;
 const distance = targetPosition - startPosition;
 const duration = 750;
 let start = null;
  
 window.requestAnimationFrame(step);

 function step(timestamp) {
  if (!start) start = timestamp;
   const progress = timestamp - start;
   window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, duration));
   if (progress < duration) window.requestAnimationFrame(step);
 }
}

function easeInOutCubic(t, b, c, d) {
 t /= d/2;
 if (t < 1) return c/2*t*t*t + b;
 t -= 2;
 return c/2*(t*t*t + 2) + b;
};