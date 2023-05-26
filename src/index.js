import ScrollReveal from 'scrollreveal'
import $ from 'jquery'
import 'slick-carousel'
import "../sass/style.scss"
import "../sass/editor-style.scss"

// Our modules / classes
import IntroLoader from "./modules/IntroLoader"
import SmoothScroll from "./modules/SmoothScroll"
import Modal from "./modules/Modal"

// Instantiate a new object using our modules/classes
const introLoader = new IntroLoader()
const smoothScroll = new SmoothScroll()
const modal = new Modal()

// Global Animation Classes //
ScrollReveal().reveal('.sr-reveal', { origin: 'bottom', distance: '-10px', duration: 600, easing: 'ease-in-out', reset: 'true' });
ScrollReveal().reveal('.sr-scale', { origin: 'bottom', distance: '-10px', duration: 600, easing: 'ease-in-out', reset: 'true', scale: 0.9 } );
ScrollReveal().reveal('.sr-sequence', { duration: 800, interval: 400, easing: 'ease-in-out', reset: 'true' } );
ScrollReveal().reveal('.sr-sequence-scale', { duration: 800, interval: 500, easing: 'ease-in-out', reset: 'true', scale: 0.9 } );

// Slick Slider //
var testimonialSlider = $('.testimonials__slider');
var timelineSlider = $('.timeline__slider');
var timelineNavigation = $('.timeline__navigation');
var timelineSlidesToShow = $('.timeline__count').html();

testimonialSlider.slick({
    dots: true,
    adaptiveHeight: true
});

timelineSlider.slick({
    asNavFor: '.timeline__navigation',
    arrows: false,
    fade: true,
    speed: 600,
    cssEase: 'linear',
    adaptiveHeight: true
});

$('.timeline__slider__prev').on('click', function() {
    timelineSlider.slick('slickPrev');
});

$('.timeline__slider__next').on('click', function() {
    timelineSlider.slick('slickNext');
});

timelineNavigation.slick({
    asNavFor: '.timeline__slider',
    slidesToShow: timelineSlidesToShow,
    arrows: false,
    variableWidth: true
});

$('.timeline__navigation .slick-slide').on('click', function() {
    var slideIndex = $(this).data('slick-index');
    timelineSlider.slick('slickGoTo', slideIndex);
});

function resizeTimeline() {
    var containerWidth = timelineNavigation.innerWidth();
    $(".timeline__navigation__box").each(function( index ) {
       var dataWidth = $(this).data('width');
       var calcWidth = dataWidth * containerWidth;
       $(this).width(calcWidth);
    });
    $(".timeline__navigation__overlap").each(function( index ) {
        var dataWidth = $(this).data('width');
        var calcWidth = dataWidth * containerWidth;
        $(this).width(calcWidth);
     });
}

resizeTimeline();

function resizedWindow(){
    resizeTimeline();
}

var timeout;
window.onresize = function(){
  clearTimeout(timeout);
  timeout = setTimeout(resizedWindow, 100);
};