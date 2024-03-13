document.addEventListener("DOMContentLoaded", function() {

    let darkerBackGround = document.createElement("div")
    darkerBackGround.id = "darkerBackGround"
    let parent = document.querySelector("body")
    parent.appendChild(darkerBackGround)

    let lightbox = document.querySelector(".alsoLikePic")
    lightbox.addEventListener("click", function() { 
        darkerBackGround.style.display = "block"
        darkerBackGround.style.backgroundColor = "rgba(0, 0, 0, 0.9)"
        darkerBackGround.style.position = "fixed"
        darkerBackGround.style.top = "0"
        darkerBackGround.style.left = "0"
        darkerBackGround.style.width = "100%"
        darkerBackGround.style.height = "100%"
        darkerBackGround.style.zIndex = "1" 
        modale.style.zIndex = "2" 
    })

})


