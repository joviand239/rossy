@extends('frontend.layouts.frontend')

@section('meta_title', 'Home')

@section('meta_description', 'Our Homepage')

@section('content')

    <section id="home">
        <div class="banner">
            <ul id="home-slider" class="slider">

                <li class="item">
                    <div class="box" style="background: url({!! url('/') !!}/assets/frontend/images/banner-image.jpg)">
                        <div class="container">
                            <div class="box-container">
                                <span class="title">BAKED YOUR CAKE</span>
                                <br>
                                <br>
                                <span class="title"> WITH BEST QUALITY INGREDIENTS</span>

                                <br>
                                <br>

                                <a href="#" class="text-btn">EXPLORE MORE <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="box" style="background: url({!! url('/') !!}/assets/frontend/images/banner-image.jpg)">
                        <div class="container">
                            <div class="box-container">
                                <span class="title">BAKED YOUR CAKE</span>
                                <br>
                                <br>
                                <span class="title"> WITH BEST QUALITY INGREDIENTS</span>

                                <br>
                                <br>

                                <a href="#" class="text-btn">EXPLORE MORE <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </section>


@endsection

