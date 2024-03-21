document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("mouseover", function(event) {
        if(event.target.closest(".fixhover")) {
            let lightbox = event.target.closest(".fixhover");
            let img = lightbox.querySelector('.alsoLikePic');
            let infoPhotoId = img.getAttribute('data-infoPhoto');
            let info = document.getElementById(infoPhotoId);
            info.classList.remove("hide");
            info.classList.add("display");
            img.style.filter = "brightness(50%)";
        }
    });

    document.body.addEventListener("mouseout", function(event) {
        if(event.target.closest(".fixhover")) {
            let lightbox = event.target.closest(".fixhover");
            let img = lightbox.querySelector('.alsoLikePic');
            let infoPhotoId = img.getAttribute('data-infoPhoto');
            let info = document.getElementById(infoPhotoId);
            info.classList.remove("display");
            info.classList.add("hide");
            img.style.filter = "brightness(100%)";
        }
    });
});
