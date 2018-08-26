@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="course">

        <div class="default-section">

            <div class="container">

                <div class="text-center">
                    <h3 class="default-subtitle">Booking Form</h3>
                    <h1 class="default-title mb-70">{!! @$page->name !!}</h1>
                </div>

                <div class="row">
                    <div class="col-md-9">

                        <form action="{!! route('submit-booking', ['permalink' => @$page->permalink]) !!}" method="POST" data-toggle="validator" role="form">
                            <div class="form-group">
                                <label class="label-form" for="name">Name</label>
                                <input type="text" class="form-control custom-control" id="name" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="email">Email</label>
                                <input type="email" class="form-control custom-control" id="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control custom-control" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="notes">Notes</label>
                                <textarea rows="5" class="form-control custom-control" id="notes" name="notes" placeholder="Notes/ Description"></textarea>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn third-btn form-btn">SUMBIT</button>
                            </div>
                        </form>


                    </div>


                    <div class="col-md-3">
                        <div class="side-wrapper mb-20">
                            <label>DATE START</label>
                            <p>{!! getDateOnly(@$page->dateFrom) !!}</p>

                            <label>DATE FINISH</label>
                            <p>{!! getDateOnly(@$page->dateTo) !!}</p>

                            <label>TIME</label>
                            <p>{!! getTimeOnly(@$page->timeFrom) !!}</p>

                            <label>TEACHER/ CHEF</label>
                            <p>@foreach(@$page->chefs as $key => $chef) {!! @$chef->name !!}{!! (count(@$page->chefs) && @$key+1 != count(@$item->chefs)) ? ', ' : '' !!} @endforeach</p>

                            <label>PRICE</label>
                            <p class="price">Rp. {!! getPriceNumber(@$page->price) !!}</p>
                        </div>
                    </div>


                </div>

            </div>

        </div>



        <div class="book-cta-wrapper" style="background: url({!! url('/') !!}/assets/frontend/images/book-cta-background.jpg)">
            <div class="container">

                <h4 class="subtitle">
                    Or you can Call us on
                </h4>

                <h1 class="title mb-0">
                    (021) 63211 45/47
                </h1>

            </div>
        </div>


    </section>


@endsection

