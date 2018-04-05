@extends('frontend.layouts.frontend')

@section('meta_title', @$page->metaTitle)

@section('meta_description', @$page->metaDescription)

@section('content')

    <section id="home">
        <div class="banner">
            <ul id="home-slider" class="slider">

                @foreach(@$page->banner as $item)
                    <li class="item">
                        <div class="box" style="background: url({!! getImageUrlSize(@$item->background[0], 'full') !!})">
                            <div class="container">
                                <div class="box-container">
                                    <span class="title">{!! @$item->title !!}</span>
                                    <br>
                                    <br>
                                    <span class="title">{!! @$item->subtitle !!}</span>

                                    <br>
                                    <br>

                                    <a href="{!! @$item->link !!}" class="text-btn">EXPLORE MORE <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="course-wrapper">

            <div class="top-wrapper">

                <div class="container small">
                    <div class="course-date-slider">
                        <div><h3>Sunday, 21th January 2018</h3></div>
                        <div><h3>Saturday, 27th January 2018</h3></div>
                        <div><h3>Sunday, 29th January 2018</h3></div>
                        <div><h3>Wednesday, 2nd February 2018</h3></div>
                        <div><h3>Friday, 10th February 2018</h3></div>
                    </div>
                </div>

            </div>

            <div class="bottom-wrapper">

                <div class="container">
                    <div class="course-detail-slider">
                        @for($i = 0 ; $i < 5 ; $i++)
                            <div>
                                <div class="box-detail">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="wrapper">
                                                <img class="icon" src="{!! url('/') !!}/assets/frontend/images/chef-hat-icon.png" alt="Chef Hat Rossy Bakery Supplier Icon">
                                                <p class="title">Baking Course by</p>
                                                <h3 class="name">Chef Cessar</h3>

                                                <p>
                                                    Baking Demo<br>
                                                    TOFFIECO & HOLLMANN
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="wrapper">
                                                <img class="icon" src="{!! url('/') !!}/assets/frontend/images/location-icon.png" alt="Location Rossy Bakery Supplier Icon">
                                                <p class="title">Baking at</p>
                                                <h3 class="name">Toko Rossy</h3>

                                                <p>
                                                    Jl. Kaji No.38,Jakarta Pusat<br>
                                                    (021) 63211 45/47
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="wrapper">
                                                <img class="icon" src="{!! url('/') !!}/assets/frontend/images/book-icon.png" alt="Book Rossy Bakery Supplier Icon">
                                                <h3 class="name">Rp. 250.000,-</h3>

                                                <div class="button-wrapper">
                                                    <a href="#" class="btn transparent-btn">SEE DETAILS</a>
                                                    <a href="#" class="btn third-btn">BOOK NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>

        </div>



        <div class="about-wrapper gray-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 mb-xs-30">
                        <img src="{!! url('/') !!}/assets/frontend/images/chef-photo.png" alt="Chef Photo">
                    </div>
                    <div class="col-md-6 col-12 mb-xs-30">
                        <div class="box-detail">
                            <h2 class="default-title mb-20">About Us</h2>
                            <h3 class="default-subtitle mb-20">Best Quality for Baking</h3>

                            <p class="default-summary mb-80">
                                Rossy Bakery Supplier is a high quality and highly trusted cake supplier which is located in center of Jakarta. We providing excellent products that will enhance the taste of the cakes and bread you bake. No need to be in doubt, cause famous chef are on our side.
                            </p>

                            <a href="#" class="text-btn">SEE MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>



        <div class="product-wrapper default-section">
            <div class="container">

                <h2 class="default-title secondary text-center mb-50">Our Popular Products</h2>

                <div class="row">
                    @for($i = 0 ; $i < 8 ; $i++)
                        <div class="col-md-3 col-12">
                            <div class="card-product">
                                <div class="image-wrapper">
                                    <a href="#">
                                        <img class="thumbnail" src="{!! url('/') !!}/assets/frontend/images/product-dummy.png" alt="Product Thumbnail {!! env('PROJECT_NAME') !!}">
                                    </a>
                                </div>

                                <a href="#" class="name">Toffieco Coffee Rhum</a>

                                <ul class="size-list">
                                    <li class="item">
                                        100 gr
                                    </li>
                                    <li class="item">
                                        250 gr
                                    </li>
                                    <li class="item">
                                        500 gr
                                    </li>
                                    <li class="item">
                                        1 kg
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>



        <div class="blog-wrapper" style="background: url('{!! url('/') !!}/assets/frontend/images/blog-banner.jpg')">

            <h2 class="default-title white text-center mb-50">Latest Update</h2>


            <div class="blog-slider">
                @for($i = 0 ; $i < 3 ; $i++)
                    <div>
                        <div class="card-blog">
                            <div class="thumb-wrapper">
                                <img src="{!! url('/') !!}/assets/frontend/images/blog-image-1.jpg" alt="Thumb Blog {!! env('PROJECT_NAME') !!}">
                            </div>
                            <div class="detail-wrapper">
                                <h4 class="tag">NEWS</h4>
                                <p class="date">20 January 2018</p>

                                <a href="#" class="title">Foto bersama chef Caesar dalam acara Demo Toffieco dan Hollman @JW Marriot Hotel</a>


                                <div class="btn-wrapper">
                                    <a href="#" class="text-btn">MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-blog">
                            <div class="thumb-wrapper">
                                <img src="{!! url('/') !!}/assets/frontend/images/blog-image-2.jpg" alt="Thumb Blog {!! env('PROJECT_NAME') !!}">
                            </div>
                            <div class="detail-wrapper">
                                <h4 class="tag">TIPS</h4>
                                <p class="date">18 January 2018</p>

                                <a href="#" class="title">10 Pilihan cake yang tepat untuk mengawali acara tahun baru IMLEK 2018</a>


                                <div class="btn-wrapper">
                                    <a href="#" class="text-btn">MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>


        </div>


        <div class="default-section">
            <div class="container">
                <h2 class="default-title text-center mb-100">Our Ingredients is Best Quality<br>for Baking</h2>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card-cta">
                            <div class="circle-wrapper">
                                <img class="icon" src="{!! url('/') !!}/assets/frontend/images/chef-icon.png" alt="Call To Action {!! env('PROJECT_NAME') !!}">
                            </div>

                            <a href="#" class="detail-wrapper">
                                <h3 class="name">Book a Baking Course</h3>

                                <hr class="custom-line">

                                <p class="detail">
                                    Book for your next courses, demo and private class.
                                    Get your knowledge and much benefit.
                                </p>
                            </a>

                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="card-cta">
                            <div class="circle-wrapper">
                                <img class="icon" src="{!! url('/') !!}/assets/frontend/images/cake-icon.png" alt="Call To Action {!! env('PROJECT_NAME') !!}">
                            </div>

                            <a href="#" class="detail-wrapper">
                                <h3 class="name">Contact us for more further</h3>

                                <hr class="custom-line">

                                <p class="detail">
                                    You can ask anything about Rossy Bakery Supplier,
                                    and we will answer it as soon as we can.
                                </p>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>


@endsection

