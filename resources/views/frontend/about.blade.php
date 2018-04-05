@extends('frontend.layouts.frontend')

@section('meta_title', @$page->metaTitle)

@section('meta_description', @$page->metaDescription)

@section('content')

    <section id="about">

        @include('frontend.layouts.section.default-banner')


        <div class="default-section">
            <div class="container small">

                <div class="text-center mb-70">
                    <h2 class="default-title">Rossy Bakery Supplier</h2>

                    <p class="default-summary">
                        {!! @$page->description !!}
                    </p>
                </div>


                <div class="row">
                    @foreach(@$page->capability as $item)
                        <div class="col-md-4 col-12">
                            <div class="advantage-wrapper">
                                <img class="icon" src="{!! getImageUrlSize(@$item->image[0], 'full') !!}" alt="Capability Icon">

                                <p class="name">{!! @$item->title !!}</p>
                            </div>
                        </div>
                    @endforeach
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

                        @foreach(@$history->timeline as $key => $item)
                            <a class="nav-item nav-link {!! (@$key == 0) ? 'active' : '' !!}" data-toggle="tab" href="#tab-history-{!! @$key !!}" role="tab" aria-controls="1" aria-selected="true">{!! @$item->year !!}</a>
                        @endforeach

                    </div>
                </nav>


                <div class="tab-content">
                    @foreach(@$history->timeline as $key => $item)
                        <div class="tab-pane fade {!! (@$key == 0) ? 'show active' : '' !!}" id="tab-history-{!! @$key !!}" role="tabpanel">
                            <p class="default-summary">
                                {!! @$item->summary !!}
                            </p>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>

    </section>


@endsection

