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
                        <a href="{!! route('product', ['type' => \App\Util\Constant::ALL]) !!}">
                            ALL
                        </a>
                    </li>
                    <li class="item">
                        <a href="{!! route('product', ['type' => \App\Util\Constant::ALL]) !!}">
                            POPULAR
                        </a>
                    </li>
                    @foreach(@$categories as $key => $item)
                        <li class="item">
                            <a href="{!! route('product', ['type' => @$item->permalink]) !!}">
                                {!! @$item->name !!}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{--<ul class="nav-product-tag">
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
                </ul>--}}

                <div class="row">
                    @foreach(@$list as $key => $item)
                        <div class="col-md-3 col-12">
                            <div class="card-product">
                                <div class="image-wrapper">
                                    <a href="{!! route('product-detail', ['permalink' => @$item->permalink]) !!}">
                                        <img class="thumbnail" src="{!! getImageUrlSize(@$item->featuredImage, 'md') !!}" alt="{!! @$item->name !!}">
                                    </a>
                                </div>

                                <a href="{!! route('product-detail', ['permalink' => @$item->permalink]) !!}" class="name">{!! @$item->name !!}</a>

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
                    @endforeach
                </div>


            </div>
        </div>



    </section>


@endsection

