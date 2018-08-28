@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="blog">

        @include('frontend.layouts.section.default-banner')

        <div class="default-section">
            <div class="container">


                <ul class="nav-category-tag">
                    <li class="item {!! (!$categoryId) ? 'active' : ' ' !!}">
                        <a href="{!! route('blog') !!}">
                            All
                        </a>
                    </li>
                    @foreach(@$category as $key => $item)
                        <li class="item {!! ($categoryId == $item->id) ? 'active' : ' ' !!}">
                            <a href="{!! route('blog', ['permalink' => @$item->permalink]) !!}">
                                {!! @$item->name !!}
                            </a>
                        </li>
                    @endforeach
                </ul>


                <div class="row">
                    @foreach(@$list as $key => $item)
                        <div class="col-md-6 col-12">
                            <div class="card-blog">
                                <div class="thumb-wrapper">
                                    <img src="{!! getImageUrlSize(@$item->thumbnailImage, 'md') !!}" alt="{!! @$item->name !!}">
                                </div>
                                <div class="detail-wrapper">
                                    <h4 class="tag">{!! @$item->category->name !!}</h4>
                                    <p class="date">{!! getCustomDate(@$item->publishDate) !!}</p>

                                    <a href="{!! route('blog-detail', ['permalink' => @$item->permalink]) !!}" class="title">{!! @$item->name !!}</a>


                                    <div class="btn-wrapper">
                                        <a href="{!! route('blog-detail', ['permalink' => @$item->permalink]) !!}" class="text-btn">MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{--<div class="text-center">
                    <a href="#" class="btn main-btn transparent">LOAD MORE</a>
                </div>--}}

            </div>
        </div>



    </section>


@endsection

