var iconBx = document.querySelectorAll('.iconBx');
var ContentBx = document.querySelectorAll('.ContentBx');

for (var i=0; i<iconBx.length; i++) {
 iconBx[i].addEventListener('mouseover', function (){
  for (var i=0; i<ContentBx.length; i++) {
   ContentBx[i].className='ContentBx';
  }
  document.getElementById(this.dataset.id).className= 'ContentBx active';
  
  for (var i=0; i<iconBx.length; i++) {
   iconBx[i].className='IconBx';
  }
  this.className="iconBx active";
 });
}