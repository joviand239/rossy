@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)


@section('content')

    <section id="product">

        <div class="default-section">
            <div class="container">


                <div class="row mb-50">
                    <div class="col-md-3 col-12">

                        <ul id="productGallery">
                            <li data-thumb="{!! getImageUrlSize(@$page->featuredImage, 'xs') !!}" data-src="{!! getImageUrlSize(@$page->featuredImage, 'md') !!}">
                                <img src="{!! url('/') !!}/assets/frontend/images/product-dummy.png" />
                            </li>
                            @foreach(@$page->gallery as $item)
                                <li data-thumb="{!! getImageUrlSize(@$item, 'xs') !!}" data-src="{!! getImageUrlSize(@$item, 'md') !!}">
                                    <img src="{!! url('/') !!}/assets/frontend/images/product-dummy.png" />
                                </li>
                            @endforeach
                        </ul>


                    </div>
                    <div class="col-md-6 col-12">

                        <h1 class="product-name">{!! @$page->category->name !!} - {!! @$page->name !!}</h1>

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
                            {!! @$page->description !!}
                        </p>

                        <p>
                            Takaran penggunaan :<br>
                            {!! @$page->dosageInstruction !!}
                        </p>

                        <p>
                            Digunakan untuk : {!! @$page->useFor !!}
                        </p>

                        <br>
                        <br>

                        @if(@$page->hasVarian)
                            <p class="bold">Kemasan</p>
                            <ul class="size-wrapper">
                                @foreach($page->varians as $key => $item)
                                    <li class="item {!! ($key == 0) ? 'active' : '' !!}" data-price="{!! @$item->price !!}">
                                        {!! @$item->name !!}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                    <div class="col-md-3 col-12">
                        <div class="side-wrapper">
                            <label>PRICE</label>
                            <p id="product-price" class="price">Rp. {!! getPriceNumber($page->varians[0]->price) !!}</p>
                        </div>
                    </div>
                </div>


                {{--<h4 class="default-subtitle small secondary mb-30">SIMILAR PRODUCT</h4>

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
                </div>--}}

            </div>
        </div>



        <div class="book-cta-wrapper" style="background: url({!! url('/') !!}/assets/frontend/images/book-cta-background.jpg)">
            <div class="container">
                <h1 class="title">
                    Want to learn cake baking? Book your seat now.
                </h1>


                <a href="{!! route('course') !!}" class="btn third-btn">
                    BOOK NOW
                </a>
            </div>
        </div>


    </section>


@endsection

@section('jsCustom')
    <script>
        $(document).ready(function () {

            $('.size-wrapper .item').click(function (e) {
                var price = $(this).attr('data-price');

                $('.size-wrapper .item').removeClass('active');

                $(this).addClass('active');

                $('#product-price').html(renderHtmlPrice(price, 'Rp.'))
            });


        })
    </script>
@endsection

