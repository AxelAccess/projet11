document.addEventListener("DOMContentLoaded", function() {
    let leftArrow = document.querySelector(".leftArrow");

    leftArrow.addEventListener("mouseover", function(){
        let postId = leftArrow.getAttribute("data-id");

        jQuery.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'hoverPhoto',
                post_id: postId 
            },
            success: function(response) {               
                let imageElement = document.querySelector("#hoverImage");
                imageElement.src = response;
                
            }
        });
    });

    let rightArrow = document.querySelector(".rightArrow");

    rightArrow.addEventListener("mouseenter", function(){
        let postId = rightArrow.getAttribute("data-id");

        jQuery.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'hoverPhoto',
                post_id: postId 
            },
            success: function(response) {  
                let imageElement = document.querySelector("#hoverImage");
                imageElement.src = response;
                
            }
        });
});
});

