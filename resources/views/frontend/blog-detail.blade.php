@extends('frontend.layouts.frontend')

@section('meta_title', 'Blog Detail')

@section('meta_description', 'Blog Detail')

@section('content')

    <section id="blog">

        <div class="default-section">

            <div class="container">

                <h1 class="default-title mb-0">Chef Caesar mengadakan Demo baking dalam acara pembukaan
                    acara topping off mall Transpark Cibubur.</h1>

                <ul class="share-wrapper">
                    <li class="item">
                        <a href="#">
                            <i class="fa fa-google-plus gplus-hover"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            <i class="fa fa-facebook fb-hover"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            <i class="fa fa-instagram ig-hover"></i>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            <i class="fa fa-twitter twitter-hover"></i>
                        </a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-md-9">

                        <img class="mb-30" src="{!! url('/') !!}/assets/frontend/images/blog-detail-image.jpg" alt="Blog Detail Image">

                    </div>


                    <div class="col-md-3">
                        <div class="side-wrapper mb-20">
                            <label>DATE</label>
                            <p>Wednesday, 09 April 2018</p>

                            <label>TIME</label>
                            <p>10.00 am - finish</p>

                            <label>TEACHER/ CHEF</label>
                            <p>Herry Lim/ Awang</p>

                            <label>CATEGORY</label>
                            <p>Events</p>
                        </div>
                    </div>

                    <div class="col-12 blog-detail-wrapper">
                        <p><strong>Demo baking bersama Chef Caesar</strong> berlangsung di ballroom mall Ciputra, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatn.</p>
                    </div>


                </div>



                <h4 class="default-subtitle small secondary mb-30">Read Next Article</h4>


                <div class="row">
                    @for($i = 0 ; $i < 2 ; $i++)
                        <div class="col-md-6 col-12">
                            <div class="card-blog">
                                <div class="thumb-wrapper">
                                    <img src="{!! url('/') !!}/assets/frontend/images/blog-image-1.jpg" alt="Thumb Blog {!! env('PROJECT_NAME') !!}">
                                </div>
                                <div class="detail-wrapper">
                                    <h4 class="tag">NEWS</h4>
                                    <p class="date">20 January 2018</p>

                                    <a href="{!! route('blog-detail') !!}" class="title">Foto bersama chef Caesar dalam acara Demo Toffieco dan Hollman @JW Marriot Hotel</a>


                                    <div class="btn-wrapper">
                                        <a href="{!! route('blog-detail') !!}" class="text-btn">MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>



            </div>

        </div>

    </section>


@endsection

