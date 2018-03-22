$(document).ready(function () {


    $("#home-slider").lightSlider({
        item: 1,
        loop: true,
        adaptiveHeight: true,
        auto: true,
        pause: 5000,
        prevHtml : '<span class="custom-prev-html"><i class="fa fa-angle-left"></i></span>',
        nextHtml : '<span class="custom-next-html"><i class="fa fa-angle-right"></i></span>',
    });

    $('.course-date-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        asNavFor: '.course-detail-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        variableWidth: true
    });


    $('.course-detail-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        fade: true,
        asNavFor: '.course-date-slider'
    });

    $('.blog-slider').slick({
        centerPadding: '60px',
        dots: true,
        arrows: true,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        centerMode: true,
        focusOnSelect: true,
        variableWidth: true
    });


    $('.custom-select').select2();



});




function getReadableDate(stringDate) {
    var m_names = new Array("Januari", "Februari", "Maret",
        "April", "Mae", "Juni", "Juli", "Augustus", "September",
        "October", "November", "December");


    var d = new Date(stringDate);
    var date = d.getDate();
    var month = d.getMonth();
    var year = d.getFullYear();

    return  date+' '+m_names[month]+' '+year;
}


function getReadableMonth(key) {
    var m_names = new Array("Januari", "Februari", "Maret",
        "April", "Mae", "Juni", "Juli", "Augustus", "September",
        "October", "November", "December");


    return  m_names[key-1];
}