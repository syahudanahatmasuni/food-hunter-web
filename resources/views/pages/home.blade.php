@extends('layouts.app')

@section('title') FOOD HUNT - Home @endsection

@section('content')

<header class="text-center">
    <h1>
        Jelajahi Makanan yang Enak
        <br>
        Semudah Satu Klik
    </h1>
    <p class="mt-3">
        Cari tempat makan
        <br>
        yang belum pernah kamu datangi
    </p>
    <a href="{{ url('/go-hunt') }}" class="btn btn-get-started px-4 mt-4">
        Hunt Makanan
    </a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            @foreach ($categories as $category)
            <div class="col-3 col-md-2 stats-detail">
                <h2>{{ $category['count'] }}</h2>
                <p>{{ $category['name'] }}</p>
            </div>
            @endforeach
        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Tempat Makan Populer</h2>
                    <p>Tempat yang belum pernah kamu datangi
                        <br>
                        sebelumnya di Bandung
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @forelse ($places as $place)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-1.jpg');">
                        <div class="travel-country">{{ $place->title }}</div>
                        <div class="travel-location">{{ $place->title }}</div>
                        <div class="travel-button mt-auto">
                            <a href="/detail?id={{ $place->id }}" class="btn btn-travel-details px-4">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @empty
                <h3 class="h3 text-white">No Data</h3>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Apa yang Bisa Kamu Lakukan?</h2>
                    <p>Kami berikan pelayanan
                        <br>
                        terbaik untukmu
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" id="testimonialContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <div class="testimonial-content">
                            <img style="width: 300px; height: 200px;" src="frontend/images/street_food.svg" alt="User" class="mb-4">
                            <h3 class="mb-4">Cari Makanan</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <div class="testimonial-content">
                            <img style="width: 300px; height: 200px;" src="frontend/images/eat.svg" alt="User" class="mb-4">
                            <h3 class="mb-4">Makan Bersama</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-center">
                        <div class="testimonial-content">
                            <img style="width: 300px; height: 200px;" src="frontend/images/review.svg" alt="User" class="mb-4">
                            <h3 class="mb-4">Beri Review</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Apa Kata Mereka?</h2>
                    <p>Tempat makan terbaik menjadikan
                        <br>
                        pengalaman tak terlupakan
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" id="testimonialContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-1.png" alt="User" class="mb-4 rounder-circle">
                            <h3 class="mb-4">Bayu</h3>
                            <p class="testimonial">
                                " Cafe di jalan utama pasir kaliki,
                                biasanya ngasih dekorasi tematik yang berubah-ubah.
                                "
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Makan di Gormeteria
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-2.png" alt="User" class="mb-4 rounder-circle">
                            <h3 class="mb-4">Bagas</h3>
                            <p class="testimonial">
                                " Ke sini senin sore, gak terlalu rame.
                                Tempatnya remang-remang gitu tapi nyaman banget. "
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Makan di One Eighty Coffee
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-3.png" alt="User" class="mb-4 rounder-circle">
                            <h3 class="mb-4">Lynch</h3>
                            <p class="testimonial">
                                " Enak tempatnya buat ngumpul sama teman, rekan kerja atau keluarga. "
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Makan di Amborgio Patisserie
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">Butuh Bantuan</a>
                    <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">Hunt Makanan</a>
                </div>
            </div> -->
        </div>
    </section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

<!-- @push('addon-style') @endpush -->
<!-- @push('prepend-script') @endpush -->

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            xoffset: 15
        });
    });
</script>
@endpush