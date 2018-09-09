@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="course">

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

                        <div class="course-detail-wrapper">
                            <img class="mb-30" src="{!! getImageUrlSize(@$page->featuredImage, 'md') !!}" alt=" {!! @$page->name !!}">


                            <div class="default-description-section">
                                {!! @$page->description !!}
                            </div>

                        </div>


                    </div>


                    <div class="col-md-3">
                        <div class="side-wrapper mb-20">
                            <label>DATE START</label>
                            <p>{!! getFullDate(@$page->dateFrom) !!}</p>

                            <label>DATE FINISH</label>
                            <p>{!! getFullDate(@$page->dateTo) !!}</p>

                            <label>TIME</label>
                            <p>{!! getCustomTime(@$page->timeFrom) !!}</p>

                            <label>TEACHER/ CHEF</label>
                            <p>@foreach(@$page->chefs as $key => $chef) {!! @$chef->name !!}{!! (count(@$page->chefs) && @$key+1 != count(@$item->chefs)) ? ', ' : '' !!} @endforeach</p>

                            <label>PRICE</label>
                            <p class="price">Rp. {!! getPriceNumber(@$page->price) !!}</p>
                        </div>

                        <a href="{!! route('course-book', ['permalink' => @$page->permalink]) !!}" class="btn btn-full third-btn p-20" tabindex="0">BOOK NOW</a>
                    </div>


                </div>

            </div>

        </div>



        <div class="book-cta-wrapper" style="background: url({!! url('/') !!}/assets/frontend/images/book-cta-background.jpg)">
            <div class="container">
                <h1 class="title">
                    Only available for {!! @$page->quota !!} seats! Book yours now.
                </h1>


                <a href="{!! route('course-book', ['permalink' => @$page->permalink]) !!}" class="btn third-btn">
                    BOOK NOW
                </a>
            </div>
        </div>


    </section>


@endsection


@section('jsCustom')
    <script>
        var hasSuccess = {!! (Session::has('success')) ? 1 : 0 !!};

        $(document).ready(function (e) {

            if (hasSuccess == 1) {
                $('#bookingFormModal').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
            }

        })
    </script>
@endsection

