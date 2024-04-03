document.addEventListener("DOMContentLoaded", function() {



 
    

    let photos = document.querySelectorAll(".fixhover");
    let positionPhoto = 0;

    let lightbox = document.querySelector(".lightbox");
    let closeLightbox = document.querySelector(".close");
    
    document.body.addEventListener("click", function(event) {
        if (event.target.closest(".fullScreenIco")) {
            let photoElement = event.target.closest(".fixhover").querySelector("img");
            let photoURL = photoElement.src;
            let ref = photoElement.getAttribute("data-ref");
            let cat = photoElement.getAttribute("data-cat");
            let lightboxPhotoElement = lightbox.querySelector(".lightBoxPic");
            lightboxPhotoElement.src = photoURL;
            document.getElementById("lightboxRef").textContent = ref;
            document.getElementById("lightboxCat").textContent = cat;
            console.log(ref, cat);
            lightbox.style.display = "flex";

        }
    })
    let links = document.querySelectorAll(".catPhoto a");
    links.forEach(function(link) {
    link.classList.add('whiteCat'); 
    });

    closeLightbox.addEventListener("click", function() {
        lightbox.style.display = "none";
    })
    
   
    leftArrow.addEventListener("click", function(e){
        let photosArray = Array.from(photos);
        
        // Trouver l'index de la photo actuellement affichée
        let photoCourante = document.querySelector(".lightBoxPic").src;
        let positionPhotoCourante = photosArray.findIndex(photo => photo.querySelector("img").src === photoCourante);
        
        // Incrémenter l'index de la photo actuellement affichée
        positionPhotoCourante = (positionPhotoCourante - 1) % photosArray.length;
        
        // Mettre à jour les éléments de la lightbox avec les données de la nouvelle photo
        let photoSuivante = photosArray[positionPhotoCourante];
        let photoElement = photoSuivante.querySelector("img");
        let photoURL = photoElement.src;
        let ref = photoElement.getAttribute("data-ref");
        let cat = photoElement.getAttribute("data-cat");
        let lightboxPhotoElement = lightbox.querySelector(".lightBoxPic");
        lightboxPhotoElement.src = photoURL;
        document.getElementById("lightboxRef").textContent = ref;
        document.getElementById("lightboxCat").textContent = cat;
        
        console.log(ref, cat);
        lightbox.style.display = "flex";
    });
    
    rightArrow.addEventListener("click", function(e) {
        // Convertir NodeList en tableau
        let photosArray = Array.from(photos);
        
        // Trouver l'index de la photo actuellement affichée
        let photoCourante = document.querySelector(".lightBoxPic").src;
        let positionPhotoCourante = photosArray.findIndex(photo => photo.querySelector("img").src === photoCourante);
        
        // Incrémenter l'index de la photo actuellement affichée
        positionPhotoCourante = (positionPhotoCourante + 1) % photosArray.length;
        
        // Mettre à jour les éléments de la lightbox avec les données de la nouvelle photo
        let photoSuivante = photosArray[positionPhotoCourante];
        let photoElement = photoSuivante.querySelector("img");
        let photoURL = photoElement.src;
        let ref = photoElement.getAttribute("data-ref");
        let cat = photoElement.getAttribute("data-cat");
        let lightboxPhotoElement = lightbox.querySelector(".lightBoxPic");
        lightboxPhotoElement.src = photoURL;
        document.getElementById("lightboxRef").textContent = ref;
        document.getElementById("lightboxCat").textContent = cat;
        
        console.log(ref, cat);
        lightbox.style.display = "flex";
    });
})


