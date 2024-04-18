document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("mouseover", mouseHoverOverlay);
    document.body.addEventListener("mouseout", mouseOutOverlay);
});

function mouseHoverOverlay(event) {
    hoverEvent(event, true);
}

function mouseOutOverlay(event) {
    hoverEvent(event, false);
}

function hoverEvent(event, mouseHover) {
    if(event.target.closest(".overlay")) {
        let overlay = event.target.closest(".overlay");
        let img = overlay.querySelector('.alsoLikePic');
        let infoPhotoId = img.getAttribute('data-idPhoto');
        let info = document.getElementById(infoPhotoId);
        if (mouseHover) {
            info.classList.remove("hide");
            info.classList.add("display");
            img.style.filter = "brightness(50%)";
        } else {
            info.classList.remove("display");
            info.classList.add("hide");
            img.style.filter = "brightness(100%)";
        }
    }
        // Colore la catégorie en blanc
        let catPhotos = document.querySelectorAll(".catPhoto a");
        catPhotos.forEach(function(catPhoto) {
        catPhoto.classList.add('whiteCat'); 
        });    
}

