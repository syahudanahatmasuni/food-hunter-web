@extends('layouts.app')

@section('title') FOOD HUNT - Favorite @endsection

@section('content')
<main>
    <section class="section-details-header"> </section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Home
                            </li>
                            <li class="breadcrumb-item active">
                                Favorite
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col">
                    <form class="form-inline my-2 my-lg-0 float-right">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-lg-11 pl-lg-0 mx-auto">
                    <section class="section-popular-content" id="popularContent">
                        <div class="container">
                            <div class="section-popular-travel row justify-content-center">
                                @forelse($items as $place)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-1.jpg');">
                                        <div class="travel-country">{{ $place->title }}</div>
                                        <div class="travel-location">{{ $place->location }}</div>
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
                </div>
            </div>
            {{ $items->links() }}
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