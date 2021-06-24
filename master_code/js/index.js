/*global $, jQuery, alert, window*/
$(function () { 
    "use strict";
    /*animation*/   
    $('.main h1').animate({right:0, opacity:1},1200,function(){
        $('.main p').animate({right:0, opacity:1},1200, function(){
            $('.main a').animate({opacity:1},1200)
        })
    });
    /*scrol down*/
    $('.main i').click(function () {
        $('html, body').animate({
        scrollTop: $('.next').offset().top - 20
        }, 1000);
    });
    /*trigger mixitup*/
    $('#container').mixItUp();
    $('.shuffle li').click(function() {
    $(this).addClass('select').siblings().removeClass('select');
    });
    /*scroll top*/     
    var scrollButton = $("#scroll-top");
    $(window).scroll(function () {
    if ( $(this).scrollTop() >= 600 ) { 
        scrollButton.show();
    } else {
        scrollButton.hide();
    }
    });
    scrollButton.click(function () {
        $("html,body").animate({ scrollTop: 0}, 600);
    });
    /*show and hide */
    
})
