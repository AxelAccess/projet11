
jQuery(document).ready(function ($) {
    var page = 2;
    var btn = document.querySelector('#loadMorePhoto') 
    var ajaxurl = btn.dataset.ajaxurl
    console.log(ajaxurl)
    $('#loadMorePhoto').on('click', function () {
       
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: btn.dataset.action,
                page: page,
            },
            success: function (response) {
                $('.photo-container').append(response);
                page++;
            },
        });
    });
});