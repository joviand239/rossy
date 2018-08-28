@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="blog">

        <div class="default-section">

            <div class="container">

                <h1 class="default-title mb-0">{!! @$page->name !!}</h1>

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

                        <img class="mb-30" src="{!! getImageUrlSize(@$page->featuredImage, 'md') !!}" alt="Blog Detail Image">

                    </div>


                    <div class="col-md-3">
                        <div class="side-wrapper mb-20">
                            <label>DATE</label>
                            <p>{!! getCustomDate(@$page->publishDate) !!}</p>

                            <label>TIME</label>
                            <p>{!! getCustomTime(@$page->publishTime) !!}</p>

                            @if(count(@$page->chefs))
                                <label>TEACHER/ CHEF</label>
                                <p>@foreach(@$page->chefs as $key => $chef) {!! @$chef->name !!}{!! (count(@$page->chefs) && @$key+1 != count(@$item->chefs)) ? ', ' : '' !!} @endforeach</p>
                            @endif

                            <label>CATEGORY</label>
                            <p>{!! @$page->category->name !!}</p>
                        </div>
                    </div>

                    <div class="col-12 blog-detail-wrapper">
                        {!! @$page->description !!}
                    </div>


                </div>



                @if(count(@$nextBlog))
                   <h4 class="default-subtitle small secondary mb-30">Read Next Article</h4>


                    <div class="row">
                        @foreach($nextBlog as $key => $item)
                            <div class="col-md-6 col-12">
                                <div class="card-blog">
                                    <div class="thumb-wrapper">
                                        <img src="{!! getImageUrlSize(@$item->thumbnailImage, 'md') !!}" alt="{!! @$item->name !!}">
                                    </div>
                                    <div class="detail-wrapper">
                                        <h4 class="tag">{!! @$item->category->name !!}</h4>
                                        <p class="date">{!! getDateOnly(@$item->publishDate) !!}</p>

                                        <a href="{!! route('blog-detail', ['permalink' => @$item->permalink]) !!}" class="title">{!! @$item->name !!}</a>


                                        <div class="btn-wrapper">
                                            <a href="{!! route('blog-detail', ['permalink' => @$item->permalink]) !!}" class="text-btn">MORE DETAIL <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>

        </div>

    </section>


@endsection

