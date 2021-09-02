const inputs = document.querySelectorAll(".input");

function addcl(){
 let parent = this.parentNode.parentNode;
 parent.classList.add("focus");
}

function remcl(){
 let parent = this.parentNode.parentNode;
 if(this.value == ""){
  parent.classList.remove("focus");
 }
}

inputs.forEach(input => {
 input.addEventListener("focus", addcl);
 input.addEventListener("blur", remcl);
});


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

function Stock() {
  var Stock=document.getElementById('iStock').value;
  var Stockaux=parseInt(Stock);
  
  var InputCant=document.getElementById('InputCant').value;
  var InputCantaux=parseInt(InputCant);

  
  if (InputCantaux<=0) {
    document.getElementById('InputCant').value=1;
  }

  else if (InputCantaux>Stockaux) {
    document.getElementById('InputCant').value=Stockaux;
  }

  else {
   
  }
}