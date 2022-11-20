@extends('layouts.app')
@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>Nusa Penida</h1>
                        <p>Republic of Indonesia Raya</p>

                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="frontend/images/nusapenida/nusapenida-1.jpg" alt="nusapenida" class="xzoom" id="xzoom-default" xoriginal="frontend/images/nusapenida/nusapenida-1.jpg">
                            </div>

                            <div class="xzoom-thumbs d-flex justify-content-md-between">
                                <a href="frontend/images/nusapenida/nusapenida-2.jpg">
                                    <img src="frontend/images/nusapenida/nusapenida-2.jpg" alt=""  class="xzoom-gallery img-fluid" xpreview="frontend/images/nusapenida/nusapenida-2.jpg">
                                </a>

                                <a href="frontend/images/nusapenida/nusapenida-3.jpg">
                                    <img src="frontend/images/nusapenida/nusapenida-3.jpg" alt=""  class="xzoom-gallery img-fluid" xpreview="frontend/images/nusapenida/nusapenida-3.jpg">
                                </a>

                                <a href="frontend/images/nusapenida/nusapenida-4.jpg">
                                    <img src="frontend/images/nusapenida/nusapenida-4.jpg" alt=""  class="xzoom-gallery img-fluid" xpreview="frontend/images/nusapenida/nusapenida-4.jpg">
                                </a>

                                <a href="frontend/images/nusapenida/nusapenida-5.jpg">
                                    <img src="frontend/images/nusapenida/nusapenida-5.jpg" alt=""  class="xzoom-gallery img-fluid" xpreview="frontend/images/nusapenida/nusapenida-5.jpg">
                                </a>

                                <a href="frontend/images/nusapenida/nusapenida-6.jpg">
                                    <img src="frontend/images/nusapenida/nusapenida-6.jpg" alt=""  class="xzoom-gallery img-fluid" xpreview="frontend/images/nusapenida/nusapenida-6.jpg">
                                </a>
                            </div>
                        </div>

                        <h2 class="mt-3">Tentang Wisata</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia ullam atque nostrum cum repellendus porro cupiditate maiores perferendis maxime libero nobis esse, repudiandae ad accusamus nihil in blanditiis, provident et sit inventore deleniti! Voluptatum excepturi assumenda quia atque deleniti vero voluptatem at alias animi quis.</p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, consequatur odio aspernatur tempora porro minus repellendus quasi id ducimus ut?</p>

                        <div class="features row">
                            <div class="col-md-4">
                                <img src="frontend/icons/ticket.png" alt="icons" class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>Tari Kecak</p>
                                </div>
                            </div>

                            <div class="col-md-4 border-left my-3 my-md-0">
                                <img src="frontend/icons/language.png" alt="icons" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>Bahasa Indonesia</p>
                                </div>
                            </div>

                            <div class="col-md-4 border-left">
                                <img src="frontend/icons/burger.png" alt="icons" class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>Local Foods</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3 mt-md-0">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>

                        <div class="members my-2">
                            <img src="frontend/images/profile/profile-circle-1.png" alt="" class="member-image mr-1">
                            <img src="frontend/images/profile/profile-circle-2.png" alt="" class="member-image mr-1">
                            <img src="frontend/images/profile/profile-circle-4.png" alt="" class="member-image mr-1">
                        </div>
                        <hr>
                        <h2>Trip Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">
                                    22 Agustus 2019
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">
                                    4d 3N
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">
                                    Open Trip
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    $80,00 / person 
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="join-container">
                        <a href="{{ route('checkout') }}" class="btn btn-block btn-join-now mt-3 py-2">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@prepend('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xZoom/xzoom.css') }}">
@endprepend

@push('addon-script')
    <script src="{{ url('frontend/libraries/xZoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false, 
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush