document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    if ($navbarBurgers.length > 0) {
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {
          const target = el.dataset.target;
          const $target = document.getElementById(target);
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });
    }
  
  });
var letexte = "Bienvenue dans mon portfolio";
var letexte = letexte.toLocaleUpperCase();
var montimer;
var cmpt = 0;
function typewriter(){
  lelien = document.getElementById('bienveue');
  if(cmpt < letexte.length){
      courant = lelien.innerHTML.substring(0, lelien.innerHTML.length);
      courant += letexte.charAt(cmpt)+"";
      lelien.innerHTML = courant;
      cmpt = cmpt + 1;
  }
  else{
      lelien.innerHTML = "";
      cmpt = -1;
  }
  setTimeout("typewriter()",200);
  
}
window.onload = function(){
  typewriter();
}