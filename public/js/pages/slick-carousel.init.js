"use strict";
$(function() {
    $(".single-item").slick(),
    $(".multiple-items").slick({infinite:!0,slidesToShow:3,slidesToScroll:3}),

    $(".responsive").slick({
        dots:!0,
        infinite:!1,
        speed:300,
        slidesToShow:4,
        slidesToScroll:4,
        responsive:[{
                breakpoint:1024,
                settings:{
                    slidesToShow:3,
                    slidesToScroll:3,
                    infinite:!0,
                    dots:!0
                }
            },
            {
                breakpoint:600,
                settings:{slidesToShow:2,slidesToScroll:2}
            },
            {
                breakpoint:480,
                settings:{slidesToShow:1,slidesToScroll:1}
            }
        ]
    }),

    $(".variable-width").slick({
        dots:!0,
        infinite:!0,
        speed:300,
        slidesToShow:1,
        centerMode:!0,
        variableWidth:!0
    }),

    $(".one-time").slick({
        dots:!0,
        infinite:!0,
        speed:300,
        slidesToShow:1,
        adaptiveHeight:!0
    }),

    $(".slick-slider-center").slick({
        centerMode:!0,
        centerPadding:"60px",
        slidesToShow:3,
        responsive:[
            {
                breakpoint:768,
                settings:{
                    arrows:!1,
                    centerMode:!0,
                    centerPadding:"40px",
                    slidesToShow:3
                }
            },
            {
                breakpoint:480,
                settings:{arrows:!1,centerMode:!0,centerPadding:"40px",slidesToShow:1}
            }
        ]
    }),
    
    $(".lazy").slick({
        lazyLoad:"ondemand",
        slidesToShow:3,
        slidesToScroll:1
    }),
    
    $(".autoplay").slick({
        slidesToShow:3,
        slidesToScroll:1,
        autoplay:!0,
        autoplaySpeed:2e3
    }),
    
    $(".slider-fade").slick({
        dots:!0,
        infinite:!0,
        speed:500,
        fade:!0,
        cssEase:"linear"
    }),
    
    $(".slider-for").slick({
        slidesToShow:1,
        slidesToScroll:1,
        arrows:!1,
        fade:!0,
        asNavFor:".slider-nav"
    }),
    
    $(".slider-nav").slick({
        slidesToShow:3,
        slidesToScroll:1,
        asNavFor:".slider-for",
        dots:!0,
        centerMode:!0,
        focusOnSelect:!0
    })
});