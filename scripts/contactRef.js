jQuery(document).ready(function ($) {
    let contactButton = document.querySelector(".contactButton")
    let darkerBackGround = document.createElement("div")
    darkerBackGround.id = "darkerBackGround"
    let parent = document.querySelector("body")
    parent.appendChild(darkerBackGround)
    
    let modale = document.querySelector(".contactModale")
    
    contactButton.addEventListener("click", function() { 
        modale.style.display = "block"
        darkerBackGround.style.display = "block"
        darkerBackGround.style.backgroundColor = "rgba(0, 0, 0, 0.9)"
        darkerBackGround.style.position = "fixed"
        darkerBackGround.style.top = "0"
        darkerBackGround.style.left = "0"
        darkerBackGround.style.width = "100%"
        darkerBackGround.style.height = "100%"
        darkerBackGround.style.zIndex = "1" 
        modale.style.zIndex = "2"  
        
        //Réference
        const referenceElement = document.getElementById('referenceId')
        var referenceValue = referenceElement.textContent.replace('Référence : ', '')
        const refPhotoField = document.getElementById('refPhoto')
        refPhotoField.value = referenceValue;


    })
    darkerBackGround.addEventListener("click", function() {
        modale.style.display = "none"
        darkerBackGround.style.display = "none"
    })

    
    })