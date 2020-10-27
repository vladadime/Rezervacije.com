    $(document).ready(function(){
    $('.contact1-info-box').fadeOut();
    $('.contact1-show').addClass('show-contact-panel');
});


$('.contact-panel input[type="radio"]').on('change', function() {
    if($('#contact1-show').is(':checked')) {
        $('.contact2-info-box').fadeOut(); 
        $('.contact1-info-box').fadeIn();
        
        $('.white-panel').addClass('right-contact');
        $('.contact2-show').addClass('show-contact-panel');
        $('.contact1-show').removeClass('show-contact-panel');
        
    }
    else if($('#contact2-show').is(':checked')) {
        $('.contact2-info-box').fadeIn();
        $('.contact1-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-contact');
        
        $('.contact1-show').addClass('show-contact-panel');
        $('.contact2-show').removeClass('show-contact-panel');
    }
});
