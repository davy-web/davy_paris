// slider 1
$('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    autoplay: true,
    dots: true,
    arrows: false
});
$('a[data-slide]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav').slick('slickGoTo', slideno - 1);
});
// slider 2
$('.slider-for-2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav-2'
});
$('.slider-nav-2').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    autoplay: false,
    focusOnSelect: true,
    dots: true,
    asNavFor: '.slider-for-2'
});
$('a[data-slide-2]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav-2').slick('slickGoTo', slideno - 1);
});