$(function() {
    // tabs===========---------=======
    
    $('.tabs__item').on("click", function(e) {
        e.preventDefault();
        
        $('.tabs__item').removeClass('tabs__item--active');
        $('.tabs__content-item').removeClass('tabs__content-item--active');
        
        $(this).addClass('tabs__item--active');
        $($(this).attr('href')).addClass('tabs__content-item--active');
    });
    console.log('hi')
});