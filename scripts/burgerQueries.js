document.addEventListener('DOMContentLoaded', function() {
    // Menu burger (Petits écrans)
    let menuToggle = document.querySelector('.menu-toggle');
    let menuModale = document.querySelector('#menu-header');
    let menuHeader = document.querySelector ("header");

    menuToggle.addEventListener('click', function() {
        menuToggle.classList.toggle('cross');
        if (menuModale.style.display == "block") {
            menuModale.style.display = "none";
            menuHeader.style.position = "";
        } else {
            menuModale.style.display = "block";
            menuHeader.style.position = "fixed";
        }
    });
});