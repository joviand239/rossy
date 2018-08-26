@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="product">

        @include('frontend.layouts.section.default-banner')

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

