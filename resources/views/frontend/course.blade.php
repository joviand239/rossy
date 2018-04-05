@extends('frontend.layouts.frontend')

@section('meta_title', @$page->metaTitle)

@section('meta_description', @$page->metaDescription)

@section('content')

    <section id="course">

        @include('frontend.layouts.section.default-banner')

        <div class="default-section">

            <div class="container small">

                <h2 class="default-title text-center mb-50">Upcoming this Month</h2>

                @for($i = 0 ; $i < 6 ; $i++)

                    <div class="course-card">

                        <div class="img-wrapper">
                            <img class="img" src="{!! url('/') !!}/assets/frontend/images/baking-image-1.jpg" alt="Featured Baking Image">
                        </div>


                        <div class="detail-wrapper">
                            <span class="date">Rabu, 09 April 2018</span> <span class="author">Oleh: Herry Lim/ Awang</span>

                            <a href="{!! route('course-detail') !!}" class="name">MACAM-MACAM BIKA AMBON MEDAN ASLI (hands on)</a>

                            <p>Kue sangat bersarang dan lembut, cara pembuatannya sangat mudah dan praktis. </p>
                            <p>- Bika Ambon Original</p>
                            <p>- Bika Ambon Keju</p>
                            <p>- Bika Ambon Pandan Gula Malaka...</p>


                            <a href="{!! route('course-detail') !!}" class="text-btn small">SEE MORE DETAIL<i class="fa fa-long-arrow-right"></i></a>

                        </div>


                    </div>

                @endfor


            </div>

        </div>


    </section>


@endsection

