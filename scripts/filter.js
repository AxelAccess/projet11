document.addEventListener("DOMContentLoaded", function() {
    let selectElements = document.querySelectorAll("select[name='event'], select[name='format'], select[name='publish']");
    
    selectElements.forEach(function(selectEvent) { 
        selectEvent.addEventListener("change", function() {
            let optionSelected = selectEvent.options[selectEvent.selectedIndex].value;
            let data = {
                action: 'afficher_photos',
                type: optionSelected
            };

            jQuery.post(ajax_object.ajaxurl, data, function(response) {
                let photoContainer = document.querySelector('.photo-container');
                let urls = JSON.parse(response);
                photoContainer.innerHTML = '';
                for (let url of urls) {
                    let img = document.createElement('img');
                    img.src = url;
                    img.classList.add('alsoLikePic');
                    photoContainer.appendChild(img);
                }
            });
        });
    });
});