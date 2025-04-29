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

const nav = document.getElementById('menu');
const hoverZone = document.getElementById('hover-zone');

// Mostrar el menú al pasar por la zona
hoverZone.addEventListener('mouseenter', () => {
    nav.classList.add('visible');
    document.body.classList.add('menu-open');
});

// Ocultar el menú cuando el mouse sale del menú
nav.addEventListener('mouseleave', () => {
    nav.classList.remove('visible');
    document.body.classList.remove('menu-open');
});

