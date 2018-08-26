@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="course">

        @include('frontend.layouts.section.default-banner')

        <div class="default-section">

            <div class="container small">

                <h2 class="default-title text-center mb-50">Upcoming this Month</h2>

                @foreach(@$list as $key => $item)

                    <div class="course-card">

                        <div class="img-wrapper">
                            <img class="img" src="{!! getImageUrlSize(@$item->featuredImage, 'md') !!}" alt="Featured Baking Image">
                        </div>


                        <div class="detail-wrapper">
                            <span class="date">{!! getDateOnly(@$item->dateFrom) !!}</span> <span class="author">Oleh: @foreach(@$item->chefs as $key => $chef) {!! @$chef->name !!}{!! (count(@$item->chefs) && @$key+1 != count(@$item->chefs)) ? ', ' : '' !!} @endforeach</span>

                            <a href="{!! route('course-detail', ['permalink' => @$item->permalink]) !!}" class="name">{!! @$item->name !!}</a>

                            <div class="default-description-section">
                                {!! @$item->description !!}
                            </div>


                            <a href="{!! route('course-detail', ['permalink' => @$item->permalink]) !!}" class="text-btn small">SEE MORE DETAIL<i class="fa fa-long-arrow-right"></i></a>

                        </div>


                    </div>

                @endforeach


            </div>

        </div>


    </section>


@endsection

