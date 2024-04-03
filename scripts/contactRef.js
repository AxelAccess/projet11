jQuery(document).ready(function ($) {
   

    let contact = document.querySelector(".menu-item-49")
    let modale = document.querySelector(".contactModale")
    let background = document.querySelector(".darkbackground")
    contact.addEventListener("click", function() { 
        modale.style.display = "block"
        background.style.display = "block"
        
    })

    background.addEventListener("click", function() {
        modale.style.display = "none"
        background.style.display = "none"
    })
    
    let contactRefButton = document.querySelector(".contactButton")
    
    contactRefButton.addEventListener("click", function() { 
        modale.style.display = "block"
        background.style.display = "block"

        
        //Réference
        const referenceElement = document.getElementById('referenceId')
        var referenceValue = referenceElement.textContent.replace('Référence : ', '')
        const refPhotoField = document.getElementById('refPhoto')
        refPhotoField.value = referenceValue;

    })
    background.addEventListener("click", function() {
        modale.style.display = "none"
        background.style.display = "none"
    })

    
    })