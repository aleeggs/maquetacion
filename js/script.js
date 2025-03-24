let lastScrollTop = 0;
const header = document.querySelector("header");

window.addEventListener("scroll", function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Si el usuario baja, ocultar el header
        header.style.top = "-100px";  // Se mueve hacia arriba fuera de la vista
    } else {
        // Si el usuario sube, mostrar el header
        header.style.top = "0";
    }
    lastScrollTop = scrollTop;
});
