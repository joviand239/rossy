<div class="socmed-section">

    <div class="container">

        <div class="socmed-wrapper">


            <a href="{!! getAboutAttribute('facebook') !!}" class="item fb">
                <i class="fa fa-facebook"></i> Facebook
            </a>

            <a href="{!! getAboutAttribute('instagram') !!}" class="item ig">
                <i class="fa fa-instagram"></i> Instagram
            </a>


        </div>

    </div>

</div>

<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">

                <div class="list-wrapper">
                    <ul class="list">
                        <li class="item">
                            <a href="{!! route('home') !!}">Home</a>
                        </li>
                        <li class="item">
                            <a href="{!! route('product') !!}">Product</a>
                        </li>
                        <li class="item">
                            <a href="{!! route('about') !!}">About Us</a>
                        </li>
                        <li class="item">
                            <a href="{!! route('blog') !!}">Blog</a>
                        </li>
                        <li class="item">
                            <a href="{!! route('contact') !!}">Contact Us</a>
                        </li>
                    </ul>
                </div>


            </div>
            <div class="col-md-6 order-md-1">
                <p>{!! getAboutAttribute('address') !!}</p>
                <p>{!! getAboutAttribute('phone') !!}</p>
                <p>© Copyright 2018 Rossy Bakery Supplier. All rights are reserved</p>
            </div>
        </div>
    </div>

</footer>