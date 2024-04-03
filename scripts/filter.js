jQuery(document).ready(function($) {
    $('#eventSelect').change(function() {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                type: 'GET',
                url: ajax_object.ajaxurl,
                data: {
                    action: 'get_photos_by_category',
                    category_id: categoryId
                },
                success: function(response) {
                    $('#photo-container').html(response);
                    let links = document.querySelectorAll(".catPhoto a");
                    links.forEach(function(link) {
                        link.classList.add('whiteCat'); 
                       
                    });
                },
                
            });
        }
    });
});

jQuery(document).ready(function($) {
    $('#formatSelect').change(function() {
        var formatId = $(this).val();
        if (formatId) {
            $.ajax({
                type: 'GET',
                url: ajax_object.ajaxurl,
                data: {
                    action: 'get_photos_by_formats',
                    category_id: formatId
                },
                success: function(response) {
                    $('#photo-container').html(response);
                    let links = document.querySelectorAll(".catPhoto a");
                    links.forEach(function(link) {
                        link.classList.add('whiteCat'); 
                       
                    });
                },
                
            });
        }
    });
});    

jQuery(document).ready(function($) {
    $('#publishSelect').change(function() {
        var publishId = $(this).val();
        if (publishId) {
            $.ajax({
                type: 'GET',
                url: ajax_object.ajaxurl,
                data: {
                    action: 'get_photos_by_dates',
                    publish_id: publishId 
                },
                success: function(response) {
                    $('#photo-container').html(response);
                    let links = document.querySelectorAll(".catPhoto a");
                    links.forEach(function(link) {
                        link.classList.add('whiteCat'); 
                       
                    });
                },
            });
        }
    });
});
