@extends('frontend.layouts.frontend')

@section('meta_title', 'About Us')

@section('meta_description', 'About Us Page')

@section('content')

    <section id="about">

        <div class="default-banner" style="background: url({!! url('/') !!}/assets/frontend/images/banner-page.jpg)">
            <div class="container banner-wrapper">
                <h1 class="title">About Us</h1>
                <h2 class="subtitle">Know more about Rossy and the people behind it.</h2>
            </div>
        </div>


        <div class="default-section">
            <div class="container small">

                <div class="text-center mb-70">
                    <h2 class="default-title">Rossy Bakery Supplier</h2>

                    <p class="default-summary">
                        Rossy Bakery Supplier is one of the popular Bakery Supply in Indonesia, they provide high and best quality product which is very useful as well and add the rich flavor of the cake you have bake. Other than that, their product is very complete to make your cake and bread perfect. Rossy have 3 big brand: Toffieco, Hollmann and Belfieco, which is the brand is well known to the public, and no doubt the quality.
                    </p>
                </div>


                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="advantage-wrapper">
                            <img class="icon" src="{!! url('/') !!}/assets/frontend/images/thumbs-up-icon.png" alt="Advantage Icon">

                            <p class="name">BEST QUALITY PRODUCT</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="advantage-wrapper">
                            <img class="icon" src="{!! url('/') !!}/assets/frontend/images/satisfaction-icon.png" alt="Advantage Icon">

                            <p class="name">CUSTOMER SATISFACTION</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="advantage-wrapper">
                            <img class="icon" src="{!! url('/') !!}/assets/frontend/images/serve-icon.png" alt="Advantage Icon">

                            <p class="name">SERVE WITH LOVE</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <div class="default-section gray-section">
            <div class="container small">
                <div class="text-center mb-70">
                    <h2 class="default-title">Chef Profile</h2>

                    <p class="default-summary">
                        There are an amazing people behind all of this successful moment. They are people who have a big involved to make it our product is the number one, best quality product. No need to be in doubt, cause famous chef are on our side.
                    </p>
                </div>


                <div class="row">
                    <div class="col-md-4 col-12">

                        <div class="chef-wrapper">
                            <img class="photo" src="{!! url('/') !!}/assets/frontend/images/yongky-gunawan-photo.jpg" alt="Chef Photo">


                            <div class="overlay"></div>

                            <a class="chef-link" href="#">
                                YONGKI GUNAWAN
                                <i class="fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                    <div class="col-md-4 col-12">

                        <div class="chef-wrapper">
                            <img class="photo" src="{!! url('/') !!}/assets/frontend/images/lenny-limiyati-photo.jpg" alt="Chef Photo">


                            <div class="overlay"></div>

                            <a class="chef-link" href="#">
                                LENNY LIMIYATI
                                <i class="fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                    <div class="col-md-4 col-12">

                        <div class="chef-wrapper">
                            <img class="photo" src="{!! url('/') !!}/assets/frontend/images/hadi-tuwendi-photo.jpg" alt="Chef Photo">


                            <div class="overlay"></div>

                            <a class="chef-link" href="#">
                                HADI TUWENDI
                                <i class="fa fa-long-arrow-right"></i>
                            </a>

                        </div>

                    </div>
                </div>


            </div>
        </div>


        <div class="default-section">
            <div class="container small">

                <h2 class="default-title text-center mb-50">History</h2>

                <nav>
                    <div class="nav nav-tabs" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-history-1" role="tab" aria-controls="1" aria-selected="true">1990</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-2" role="tab" aria-controls="2" aria-selected="false">1995</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-3" role="tab" aria-controls="3" aria-selected="false">1997</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-4" role="tab" aria-controls="3" aria-selected="false">1998</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-5" role="tab" aria-controls="3" aria-selected="false">2005</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-6" role="tab" aria-controls="3" aria-selected="false">2010</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-history-7" role="tab" aria-controls="3" aria-selected="false">2017</a>
                    </div>
                </nav>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-history-1" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-2" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-3" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-4" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-5" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-6" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-history-7" role="tabpanel">
                        <p class="default-summary">
                            Our journey is not short, starting from 1990 we established this wholeheartedly. lorem ipsum dolor sit amet
                        </p>
                    </div>
                </div>


            </div>
        </div>

    </section>


@endsection

