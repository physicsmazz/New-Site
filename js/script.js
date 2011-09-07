if($('html').hasClass('js')){
    $('#noJs').remove();
}

$(function() {

    if($('html').hasClass('no-borderradius')){
        $('html').prepend('<div id="ie">Your browser doesn\'t support some of the new CSS styles.' +
                '<br>Consider upgrading to <a target="_blank" href="http://www.mozilla.com/en-US/firefox/">Firefox</a>, <a target="_blank" href="http://www.google.com/chrome">Chrome</a>, <a target="_blank" href="http://www.apple.com/safari/download/">Safari</a>, or <a target="_blank" href="http://windows.microsoft.com/ie9">IE9</a> for a better viewing experience. <span id="closeIE">X</span></span></div>');
        $('html').delegate('#closeIE','click',function(){
            $('#ie').slideUp(400, function(){
                $(this).remove();
            })
        });
    }


});

