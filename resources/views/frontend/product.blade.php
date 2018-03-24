@extends('frontend.layouts.frontend')

@section('meta_title', 'Product')

@section('meta_description', 'Product')

@section('content')

    <section id="product">

        <div class="default-banner" style="background: url({!! url('/') !!}/assets/frontend/images/banner-page.jpg)">
            <div class="container banner-wrapper">
                <h1 class="title">PRODUCT</h1>
                <h2 class="subtitle">Our complete catalogue are here, all your needs to bake your cake is here, so enjoy it ;)</h2>
            </div>
        </div>


        <div class="default-section">
            <div class="container">


                <ul class="nav-product">
                    <li class="item active">
                        <a href="#">
                            POPULAR
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            TOFFIECO
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            HOLLMANN
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            BELFIECO
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            DECORATION
                        </a>
                    </li>
                </ul>

                <ul class="nav-product-tag">
                    <li class="item active">
                        <a href="#">
                            All
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Bakar
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Blackforest
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Buttercream
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Coffee
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Flavour
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Food Color
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Pasta
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            Semprot
                        </a>
                    </li>
                </ul>

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



    </section>


@endsection

