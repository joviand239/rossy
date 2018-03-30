@extends('frontend.layouts.frontend')

@section('meta_title', 'Baking Course Booking Form')

@section('meta_description', 'Baking Course Booking Form')

@section('content')

    <section id="course">

        <div class="default-section">

            <div class="container">

                <div class="text-center">
                    <h3 class="default-subtitle">Booking Form</h3>
                    <h1 class="default-title mb-70">Macam-macam Bika Ambon Medan Asli (hands on)</h1>
                </div>

                <div class="row">
                    <div class="col-md-9">

                        <form>
                            <div class="form-group">
                                <label class="label-form" for="name">Name</label>
                                <input type="text" class="form-control custom-control" id="name" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="email">Email</label>
                                <input type="email" class="form-control custom-control" id="email" name="email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="phone">Phone Number</label>
                                <input type="text" class="form-control custom-control" id="phone" name="phone" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="notes">Notes</label>
                                <textarea rows="5" class="form-control custom-control" id="notes" name="notes" placeholder="Notes/ Description"></textarea>
                            </div>

                            <div class="form-group text-right">
                                <a href="#" data-toggle="modal" data-target="#bookingFormModal" class="btn third-btn form-btn">SUMBIT</a>
                            </div>
                        </form>


                    </div>


                    <div class="col-md-3">
                        <div class="side-wrapper mb-20">
                            <label>DATE START</label>
                            <p>Wednesday, 09 April 2018</p>

                            <label>DATE FINISH</label>
                            <p>Thursday, 10 April 2018</p>

                            <label>TIME</label>
                            <p>10.00 am</p>

                            <label>TEACHER/ CHEF</label>
                            <p>Herry Lim/ Awang</p>

                            <label>PRICE</label>
                            <p class="price">Rp. 800.000,-</p>
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

