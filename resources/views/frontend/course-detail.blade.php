@extends('frontend.layouts.frontend')

@section('meta_title', 'Baking Course Detail')

@section('meta_description', 'Baking Course Detail')

@section('content')

    <section id="course">

        <div class="default-section">

            <div class="container">

                <h1 class="default-title mb-0">Macam-macam Bika Ambon Medan Asli (hands on)</h1>

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
                            <img class="mb-30" src="{!! url('/') !!}/assets/frontend/images/baking-detail-image-1.jpg" alt="Baking Course Detail Image">


                            <p>Kue sangat bersarang dan lembut, cara pembuatannya sangat mudah dan praktis.</p>


                            <ul>
                                <li>
                                    Bika Ambon Original
                                </li>
                                <li>
                                    Bika Ambon Keju
                                </li>
                                <li>
                                    Bika Ambon Pandan Gula Malaka
                                </li>
                                <li>
                                    Bika Ambon Almond
                                </li>
                            </ul>



                        </div>


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

                        <a href="{!! route('course-book') !!}" class="btn btn-full third-btn p-20" tabindex="0">BOOK NOW</a>
                    </div>


                </div>

            </div>

        </div>



        <div class="book-cta-wrapper" style="background: url({!! url('/') !!}/assets/frontend/images/book-cta-background.jpg)">
            <div class="container">
                <h1 class="title">
                    Only available for 25 seats! Book yours now.
                </h1>


                <a href="{!! route('course-book') !!}" class="btn third-btn">
                    BOOK NOW
                </a>
            </div>
        </div>


    </section>


@endsection

