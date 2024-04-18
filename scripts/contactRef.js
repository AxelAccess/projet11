document.addEventListener("DOMContentLoaded", function() {
   
    let contactMenuButton = document.querySelector(".menu-item-49")
    let contactWindow = document.querySelector(".contactWindow")
    let background = document.querySelector(".darkbackground")

    contactMenuButton.addEventListener("click", function() { 
        contactWindow.style.display = "block"
        background.style.display    = "block"    
    })

    background.addEventListener("click", function() {
        contactWindow.style.display = "none"
        background.style.display    = "none"
        
    })
    
    let contactRefButton = document.querySelector(".contactButton")
    
    contactRefButton.addEventListener("click", function() { 
        contactWindow.style.display = "block"
        background.style.display    = "block"
        
        //Réference
        let referenceElement = document.getElementById('referenceId')
        let refPhotoField    = document.getElementById('refPhoto')
        let referenceValue   = referenceElement.textContent.replace('Référence : ', '')        
        refPhotoField.value  = referenceValue;
    })
})