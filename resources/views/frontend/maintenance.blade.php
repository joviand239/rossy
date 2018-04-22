<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Coming Soon | {!! env('PROJECT_NAME') !!}</title>
    <meta name="description" content="{!! env('PROJECT_NAME') !!} Coming Soon Page">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/custom-bootstrap-margin-padding.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/frontend/css/maintenance.css">


</head>
<body id="body-maintenance">

<section id="maintenance">
    <div class="container">
        <img class="logo animated bounceInDown" src="{!! url('/') !!}/assets/frontend/images/logo-white.png" alt="Logo Rossy">

        <h1 class="title">COMING SOON</h1>

        <hr class="small">

        <h2 class="subtitle">
            We’re currently working on creating our new website. We’ll be launching soon. Contact us for more information
        </h2>

        {{--<a id="view-contact" href="#" class="btn main-btn">CONTACT US</a>--}}

        <div class="contact-wrapper">
            <div class="item-wrapper">
                <i class="fa fa-map-pin"></i>
                <p>Jl. Kaji No 38A, Jakarta Pusat</p>
            </div>
            <div class="item-wrapper">
                <i class="fa fa-phone"></i>
                <p>(021) 63211 45/47</p>
            </div>
            <div class="item-wrapper">
                <i class="fa fa-envelope-o"></i>
                <p>info@rossybakerysupplier.com</p>
            </div>
        </div>

        <p class="copyright">
            © Copyright 2018. All rights are reserved
        </p>

       <ul class="socmed-list">
           <li>
               <a href="https://www.facebook.com/tokorossy/">
                   <i class="fa fa-facebook"></i>
               </a>
           </li>
           <li>
               <a href="https://www.instagram.com/rossy_bakery_supplier/">
                   <i class="fa fa-instagram"></i>
               </a>
           </li>
       </ul>


    </div>
</section>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function () {


        var animationEnd = (function(el) {
            var animations = {
                animation: 'animationend',
                OAnimation: 'oAnimationEnd',
                MozAnimation: 'mozAnimationEnd',
                WebkitAnimation: 'webkitAnimationEnd',
            };

            for (var t in animations) {
                if (el.style[t] !== undefined) {
                    return animations[t];
                }
            }
        })(document.createElement('div'));


        $('#view-contact').click(function (e) {
            e.preventDefault();

            $(this).addClass('animated fadeOutUp');

            $('#view-contact').one(animationEnd, function () {
                $(this).css('display', 'none');
                $('.contact-wrapper').css('display', 'flex');
                $('.contact-wrapper').addClass('animated fadeInDown');
            });


        })
    })
</script>

</body>
</html>

