var container = document.getElementById('Container-not');

window.onmousemove = function (e) {
 var x = - e.clientX/22,
 y = - e.ClientY/22;
 container.style.backgroundPositionX = x + 'px';
 container.style.backgroundPositionY = y + 'px';
}