document.addEventListener("DOMContentLoaded", function() {

    let contactModal = document.createElement("div")
    contactModal.id = "contactModal"
    let parent = document.querySelector("body")
    parent.appendChild(contactModal)

    let contact = document.querySelector(".menu-item-49")
    let modale = document.querySelector(".contactModale")

    contact.addEventListener("click", function() { 
        modale.style.display = "block"
        contactModal.style.display = "block"
        contactModal.style.backgroundColor = "rgba(0, 0, 0, 0.9)"
        contactModal.style.position = "fixed"
        contactModal.style.top = "0"
        contactModal.style.left = "0"
        contactModal.style.width = "100%"
        contactModal.style.height = "100%"
        contactModal.style.zIndex = "1" 
        modale.style.zIndex = "2" 
    })

    contactModal.addEventListener("click", function() {
        modale.style.display = "none"
        contactModal.style.display = "none"
    })
 
    
    let lightbox = document.querySelector(".lightbox");
    let closeLightbox = document.querySelector(".close");
    
    document.body.addEventListener("click", function(event) {
        if (event.target.closest(".fullScreenIco")) {
            let photoElement = event.target.closest(".fixhover").querySelector("img");
            let photoURL = photoElement.src;
            let ref = photoElement.getAttribute("data-ref");
            let cat = photoElement.getAttribute("data-cat");
    
            // Mettez à jour l'élément image dans la lightbox avec l'URL de l'image
            let lightboxPhotoElement = lightbox.querySelector(".lightBoxPic");
            lightboxPhotoElement.src = photoURL;
    
            // Mettez à jour les informations de référence et de catégorie dans la lightbox
            document.getElementById("lightboxRef").textContent = ref;
            document.getElementById("lightboxCat").textContent = cat;
            console.log(ref, cat);
            lightbox.style.display = "flex";
        }
    })
    
    closeLightbox.addEventListener("click", function() {
        lightbox.style.display = "none";
    })
    
})


