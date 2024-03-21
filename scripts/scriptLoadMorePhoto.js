jQuery(document).ready(function($) {
    $('#loadMorePhoto').click(function() {
        var ajaxurl = $(this).data('ajaxurl');
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'loadMorePhotos',
                offset: $('.fixhover').length
            },
            success: function(response) {
                $('.photo-container').append(response);
            },
            error: function() {
                console.log('Erreur lors du chargement des photos supplémentaires.');
            }
        });
    });
});