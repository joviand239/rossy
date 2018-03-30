@extends('frontend.layouts.frontend')

@section('meta_title', 'Blog')

@section('meta_description', 'Blog')

@section('content')

    <section id="blog">

        <div class="default-banner" style="background: url({!! url('/') !!}/assets/frontend/images/banner-page.jpg)">
            <div class="container banner-wrapper">
                <h1 class="title">BLOG</h1>
                <h2 class="subtitle">all about Rossy's, baking cake, recipes, and your hobbies are here</h2>
            </div>
        </div>


        <div class="default-section">
            <div class="container">


                <ul class="nav-category-tag">
                    <li class="item active">
                        <a href="#">
                            All
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Recipes
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Tips
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            News
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Events
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Video
                        </a>
                    </li>
                </ul>


                <div class="row">
                    @for($i = 0 ; $i < 6 ; $i++)
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


                <div class="text-center">
                    <a href="#" class="btn main-btn transparent">LOAD MORE</a>
                </div>

            </div>
        </div>



    </section>


@endsection

