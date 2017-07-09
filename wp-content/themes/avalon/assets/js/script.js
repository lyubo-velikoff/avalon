var avalon = avalon || {};

avalon.setUpCategoryFilter = function() {
    $('.categories ul ul ul').parent('.cat-item').append('<span class="toggle-cat"><i class="fa fa-caret-down" aria-hidden="true"></i>');

    $('.toggle-cat').on('click', function(e) {
        e.preventDefault();
        $(this).children().toggleClass('fa-caret-down fa-caret-up');
        $(this).prev().slideToggle('slow');
        
    });

};

$(document).ready(function() {
    $('body').addClass('visible');
    
    avalon.setUpCategoryFilter();
});
