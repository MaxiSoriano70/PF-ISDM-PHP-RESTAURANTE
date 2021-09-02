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