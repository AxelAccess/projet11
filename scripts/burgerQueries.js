document.addEventListener('DOMContentLoaded', () => {

    const menuToggle = document.querySelector('.menu-toggle');
    let menuModale = document.querySelector('#menu-header');
    let menuHeader = document.querySelector ("header");
    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active');
        if (menuModale.style.display === "block") {
            menuModale.style.display = "none";
            menuHeader.style.position = "";
        } else {
            menuModale.style.display = "block";
            menuModale.style.position = "fixed";
            menuHeader.style.position = "fixed";
        }
    });
});