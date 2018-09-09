@extends('frontend.layouts.frontend')

@section('metaTitle', @$page->metaTitle)
@section('metaDescription', @$page->metaDescription)
@section('metaKeywords', @$page->metaKeywords)

@section('content')

    <section id="contact">

        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.719519752979!2d106.81302631420407!3d-6.168300662165295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6784dd00c2d%3A0x44d1aaa5b1a99625!2sJl.+Kaji+No.38%2C+Petojo+Utara%2C+Gambir%2C+Kota+Jakarta+Pusat%2C+Daerah+Khusus+Ibukota+Jakarta+10130!5e0!3m2!1sen!2sid!4v1522399505097" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>


        <div class="default-section">
            <div class="container">


                <ul class="nav nav-tabs nav-custom-tabs mb-50">
                    <li class="nav-item item">
                        <a class="nav-link active" data-toggle="tab" href="#form" role="tab" aria-controls="home" aria-selected="true">
                            Contact Form
                        </a>
                    </li>
                    <li class="nav-item item">
                        <a class="nav-link" data-toggle="tab" href="#partner" role="tab" aria-controls="partner" aria-selected="false">
                            Distributors
                        </a>
                    </li>
                </ul>



                <div class="tab-content">
                    <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="info-wrapper">
                                    <h3 class="label">TOKO ROSSY</h3>
                                    <p>{!! getSettingAttribute('address') !!}</p>

                                    <h3 class="label">CONTACT</h3>
                                    <p>{!! getSettingAttribute('phone') !!}</p>

                                    <h3 class="label">EMAIL</h3>
                                    <p>{!! getSettingAttribute('email') !!}</p>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <form method="POST" action="{!! route('submitContact') !!}">
                                    <div class="form-group">
                                        <label class="label-form" for="name">Name</label>
                                        <input type="text" class="form-control custom-control" id="name" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-form" for="email">Email</label>
                                        <input type="email" class="form-control custom-control" id="email" name="email" placeholder="Your Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-form" for="phone">Phone Number</label>
                                        <input type="text" class="form-control custom-control" id="phone" name="phone" placeholder="Your Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-form" for="description">Notes</label>
                                        <textarea rows="5" class="form-control custom-control" id="description" name="description" placeholder="Notes/ Description" required></textarea>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn third-btn form-btn">SUMBIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="partner" role="tabpanel" aria-labelledby="partner-tab">

                        <div class="partner-wrapper">

                            @foreach(@$partners as $key => $item)
                                <div class="partner-card">

                                    <h3 class="name">{!! @$item->name !!}</h3>

                                    <p class="address">{!! @$item->address !!}</p>
                                    <p class="phone"><strong>p.</strong>{!! @$item->phone !!}</p>


                                    <a target="_blank" href="{!! @$item->mapLink !!}" class="text-btn small">SEE MAPS <i class="fa fa-long-arrow-right"></i></a>

                                </div>
                            @endforeach

                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>


@endsection

@section('jsCustom')
    <script>
        var success = {!! (session()->has('success')) ? 1 : 0 !!};

        $(document).ready(function () {
            
            if (success) {
                $('#successModal').modal({
                    keyboard: false,
                    backdrop: 'static',
                });
            }

        });
    </script>
@endsection

