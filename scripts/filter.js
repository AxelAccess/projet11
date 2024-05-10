jQuery(document).ready(function($) {
    $('#photoCategorySelect').change(function() {
        let categoryId = $(this).val();
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
        let formatId = $(this).val();
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
        let publishId = $(this).val();
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
    let sels = document.querySelectorAll('.sel');

    sels.forEach(sel => {
        let label = sel.querySelector('.label');
        let options = sel.querySelector('.options');

        sel.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.options').forEach(otherOptions => {
                if (otherOptions !== options) {
                    otherOptions.style.visibility = 'hidden'; 
                }
            });
            options.style.visibility = options.style.visibility === 'visible' ? 'hidden' : 'visible';
        });

        document.body.addEventListener('click', (e) => {
            options.style.visibility = 'hidden';
        });

        options.addEventListener('click', (e) => {
            if (e.target.tagName === 'DIV') {
                e.stopPropagation();
                label.textContent = e.target.textContent;
                e.target.classList.add('selected');
                Array.from(e.target.parentNode.children).forEach((child) => {
                    if (child !== e.target) {
                        child.classList.remove('selected');
                    }
                });
                options.style.visibility = 'hidden';

                let selectedValue = e.target.getAttribute('data-value');
                $('#photoCategorySelect').val(selectedValue);
                $('#photoCategorySelect').trigger('change');
                $('#formatSelect').val(selectedValue);
                $('#formatSelect').trigger('change');
                $('#publishSelect').val(selectedValue);
                $('#publishSelect').trigger('change');
            }
        });
    });
});

