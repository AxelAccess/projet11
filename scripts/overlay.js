document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("mouseover", mouseHoverHoverlay);
    document.body.addEventListener("mouseout", mouseOutOverlay);
});

function mouseHoverHoverlay(event) {
    hoverEvent(event, true);
}

function mouseOutOverlay(event) {
    hoverEvent(event, false);
}

function hoverEvent(event, mouseHover) {
    if(event.target.closest(".overlay")) {
        let lightbox = event.target.closest(".overlay");
        let img = lightbox.querySelector('.alsoLikePic');
        let infoPhotoId = img.getAttribute('data-infoPhoto');
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
}

