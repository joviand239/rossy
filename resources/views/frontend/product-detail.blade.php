@extends('frontend.layouts.frontend')

@section('meta_title', 'Product Detail')

@section('meta_description', 'Product Detail')

@section('content')

    <section id="product">

        <div class="default-section">
            <div class="container">


                <div class="row mb-50">
                    <div class="col-md-3 col-12">

                        <ul id="productGallery">
                            <li data-thumb="{!! url('/') !!}/assets/frontend/images/product-dummy.png" data-src="{!! url('/') !!}/assets/frontend/images/product-dummy.png">
                                <img src="{!! url('/') !!}/assets/frontend/images/product-dummy.png" />
                            </li>
                            <li data-thumb="{!! url('/') !!}/assets/frontend/images/product-dummy.png" data-src="{!! url('/') !!}/assets/frontend/images/product-dummy.png">
                                <img src="{!! url('/') !!}/assets/frontend/images/product-dummy.png" />
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-6 col-12">

                        <h1 class="product-name">Toffieco - Coffee Rhum</h1>

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

                        <p>
                            Toffieco Perisa Coffee Rhum ini digunakan untuk menambah aroma yang tajam pada kue
                        </p>

                        <p>
                            Takaran penggunaan :<br>
                            Masukkan 20ml Perisa Coffee Rhum ini ke dalam 1kg adonan
                        </p>

                        <p>
                            Digunakan untuk : Vla, Pudding, Ice Cream, Ganache, Aneka Kue, dll
                        </p>

                        <br>
                        <br>

                        <p class="bold">Kemasan</p>

                        <ul class="size-wrapper">
                            <li class="item active">
                                24 x 100g
                            </li>
                            <li class="item">
                                24 x 250g
                            </li>
                            <li class="item">
                                24 x 500g
                            </li>
                            <li class="item">
                                24 x 1000g
                            </li>
                            <li class="item">
                                24 x 5000g
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-3 col-12">
                        <div class="side-wrapper">
                            <label>PRICE</label>
                            <p class="price">Rp. 800.000,-</p>
                        </div>
                    </div>
                </div>






                <h4 class="default-subtitle small secondary mb-30">SIMILAR PRODUCT</h4>

                <div class="row">
                    @for($i = 0 ; $i < 4 ; $i++)
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



        <div class="book-cta-wrapper" style="background: url({!! url('/') !!}/assets/frontend/images/book-cta-background.jpg)">
            <div class="container">
                <h1 class="title">
                    Want to learn cake baking? Book your seat now.
                </h1>


                <a href="#" class="btn third-btn">
                    BOOK NOW
                </a>
            </div>
        </div>


    </section>


@endsection

