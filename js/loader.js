/* window.addEventListener("load", () => {
   refresh();
});

var refresh = function() {
   window.scrollTo(0, 0);
} */

const loader = document.querySelector('.loader');
const loaderContainer = document.querySelector('.loaderContainer');

document.documentElement.style.overflow = 'hidden';

window.addEventListener('load', () => {
   loader.classList.add('fondu-out');
   document.documentElement.style.overflow = 'visible';

   setTimeout(() => {
      loader.style.display = "none";
   }, 500);
});