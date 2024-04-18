document.addEventListener("DOMContentLoaded", function() {

    let photos = document.querySelectorAll(".overlay");
    let lightbox = document.querySelector(".lightbox");
    
    // extrait les données (cat et ref) de l'image.
    function infoPhoto(photoElement) {
        let photoURL = photoElement.src;
        let ref = photoElement.getAttribute("data-ref");
        let cat = photoElement.getAttribute("data-cat");
    
        let lightboxPhotoElement = lightbox.querySelector(".lightBoxPic");
        lightboxPhotoElement.src = photoURL;
        document.getElementById("lightboxRef").textContent = ref;
        document.getElementById("lightboxCat").textContent = cat;
    }
    // Affiche la lightbox 
    document.body.addEventListener("click", function(event) {
        if (event.target.closest(".fullScreenIco")) {
            let photoElement = event.target.closest(".overlay").querySelector("img");
            infoPhoto(photoElement)
            lightbox.style.display = "flex";
        }
    });
    

    // Ferme la lightbox
    let closeLightbox = document.querySelector(".close");
    closeLightbox.addEventListener("click", function() {
        lightbox.style.display = "none";
    });
    
    // Données de la lightbox
    function updateLightboxContent(photosArray, offset) {
        // Index de la photo actuellement affichée
        let currentPhoto = document.querySelector(".lightBoxPic").src;
        let currentPositionPhoto = photosArray.findIndex(photo => photo.querySelector("img").src === currentPhoto);
        
        // Calcule le nouvel index en tenant compte de l'offset
        currentPositionPhoto = (currentPositionPhoto + offset + photosArray.length) % photosArray.length;
        
        // Maj des éléments de la lightbox avec les données de la nouvelle photo
        let photoElement = photosArray[currentPositionPhoto].querySelector("img");
        infoPhoto(photoElement);
    }
    
    // Navigation de la lightbox
    leftArrow.addEventListener("click", function(e) {
        let photosArray = Array.from(photos);
        updateLightboxContent(photosArray, -1);
    });
    
    rightArrow.addEventListener("click", function(e) {
        let photosArray = Array.from(photos);
        updateLightboxContent(photosArray, +1);
    });
})


