$(document).ready(function () {


    if ($('#newsSlider').length) {
        $('#newsSlider').lightSlider({
            item:3,
            loop:false,
            slideMove:1,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed:600,
            pager: false,
            adaptiveHeight: true,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:3,
                        slideMove:1,
                        slideMargin:6,
                    }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                    }
                }
            ],
            onSliderLoad: function (el) {

                var maxHeight = 0,
                    container = $(el),
                    children = container.children();

                children.each(function () {
                    var childHeight = $(this).height();
                    if (childHeight > maxHeight) {
                        maxHeight = childHeight;
                    }
                });
                container.height(maxHeight);
            },
            onAfterSlide: function (el) {
                var maxHeight = 0,
                    container = $(el),
                    children = container.children();

                children.each(function () {
                    var childHeight = $(this).height();
                    if (childHeight > maxHeight) {
                        maxHeight = childHeight;
                    }
                });
                container.height(maxHeight);
            },
            onBeforeSlide: function (el) {
                var maxHeight = 0,
                    container = $(el),
                    children = container.children();

                children.each(function () {
                    var childHeight = $(this).height();
                    if (childHeight > maxHeight) {
                        maxHeight = childHeight;
                    }
                });
                container.height(maxHeight);
            }
        });
    }


    if ($('.superiorSlider').length) {
        $('.superiorSlider').lightSlider({
            item:6,
            loop:false,
            slideMove:1,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed:600,
            pager: false,
            control: false,
            slideMargin: 50,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:3,
                        slideMove:1,
                        slideMargin:6,
                    }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:2,
                        slideMove:1
                    }
                }
            ]
        });
    }

    var homeSlider, homeSliderText;


    if ($('#home-slider-text').length) {
        homeSliderText = $('#home-slider-text').lightSlider({
            item:1,
            loop:true,
            slideMove:1,
            speed:600,
            pager: false,
            control: false,
            enableTouch: false,
            enableDrag: false,
            adaptiveHeight: true,
        });
    }


    if ($('#home-slider').length) {
        homeSlider = $('#home-slider').lightSlider({
            item:1,
            loop:true,
            slideMove:1,
            speed:600,
            auto: true,
            pause: 5000,
            pauseOnHover: true,
            control: false,
            adaptiveHeight: true,
            onBeforeSlide: function (el) {
                homeSliderText.goToSlide(el.getCurrentSlideCount());
            }
        });
    }







    $('#resumeFile').change(function (e) {

        console.log(this.files[0].size);

        if(this.files[0].size > 3000000){
            alert("File is too big!");
            this.value = "";
        };

    })



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