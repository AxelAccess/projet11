jQuery(document).ready(function($) {
    $('#loadMorePhoto').click(function() {
        
        let ajaxurl = $(this).data('ajaxurl');
        $.ajax({
            type: 'GET',
            url: ajaxurl,
            data: {
                action: 'loadMorePhotos',
                offset: $('.overlay').length
            },
            success: function(response) {
                $('.photo-container').append(response);
                let links = document.querySelectorAll(".catPhoto a");
                links.forEach(function(link) {
                    link.classList.add('whiteCat');               
                });
            },
        });
    });
});