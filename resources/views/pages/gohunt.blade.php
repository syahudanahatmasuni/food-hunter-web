@extends('layouts.app')

@section('title') FOOD HUNT - Go Hunt @endsection

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
                                Go Hunt
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mb-5">

                <!--Content-->
                <div class="modal-content">

                    <!--Body-->
                    <div class="modal-body mb-0 p-0">

                        <!--Google map-->
                        <div id="map-container-google-17" class="z-depth-1-half map-container-10" style="height: 400px">
                            <iframe src="https://maps.google.com/maps?q=bandung&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">

                        <button id="go-hunt" type="button" class="btn btn-go-hunt btn-md">Go Hunt <i class="fas fa-map-marker-alt ml-1"></i></button>
                        <script src="{{ url('frontend/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
                        <script type='text/javascript'>
                            $("document").ready(function(event) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $("#go-hunt").click(function(event) {
                                    event.preventDefault();
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(goHunt, showError);
                                    } else {
                                        alert("Geolocation is not supported by this browser.");
                                    }
                                });
                            });

                            function goHunt(position) {
                                $.ajax({
                                    url: '/hunt',
                                    type: "GET",
                                    data: {
                                        lat: -6.972854119289348,
                                        lon: 107.6303547184914
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        var tags = "";
                                        if (response['data'].length <= 0) {
                                            $('.modal-title').replaceWith('No Places Found');
                                            $('#message').replaceWith('There are no places found nearby you. Don\'t worry, keep hunting!');
                                            $('#myModal').modal();
                                        } else {
                                            for (let index = 0; index < response['data'].length; index++) {
                                                const element = response['data'][index];
                                                tags += "<div class=\"col-sm-6 col-md-4 col-lg-3\">" +
                                                    "<div class=\"card-travel text-center d-flex flex-column\" style=\"background-image: url('frontend/images/Popular-1.jpg');\">" +
                                                    "<div class=\"travel-country\">" + element.title + "</div>" +
                                                    "<div class=\"travel-location\">" + element.location + "</div>" +
                                                    "<div class=\"travel-button mt-auto\">" +
                                                    "<a href=\"/detail?id=" + element.id + "\" class=\"btn btn-travel-details px-4\">Lihat Detail</a>" +
                                                    "</div>" +
                                                    "</div>" +
                                                    "</div>"
                                            }
                                        }
                                        $('#content-result').append(tags);
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            }

                            function showError(error) {
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        alert("User denied the request for Geolocation.");
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        alert("Location information is unavailable.");
                                        break;
                                    case error.TIMEOUT:
                                        alert("The request to get user location timed out.");
                                        break;
                                    case error.UNKNOWN_ERROR:
                                        alert("An unknown error occurred.");
                                        break;
                                }
                            }
                        </script>

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-11 pl-lg-0 mx-auto">
                    <section class="section-popular-content" id="popularContent">
                        <div class="container">
                            <div class="section-popular-travel row justify-content-center" id="content-result">
                                <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-1.jpg');">
                                        <div class="travel-country">GORMETERIA</div>
                                        <div class="travel-location">PASIRKALIKI</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-2.jpg');">
                                        <div class="travel-country">ONE EIGHTY COFFEE</div>
                                        <div class="travel-location">DAGO BAWAH</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-3.jpg');">
                                        <div class="travel-country">TROUIT CAFE</div>
                                        <div class="travel-location">CICENDO</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-4.jpg');">
                                        <div class="travel-country">AMBORGIO PATISSERIE</div>
                                        <div class="travel-location">BANDUNG WETAN</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-1.jpg');">
                                        <div class="travel-country">GORMETERIA</div>
                                        <div class="travel-location">PASIRKALIKI</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-2.jpg');">
                                        <div class="travel-country">ONE EIGHTY COFFEE</div>
                                        <div class="travel-location">DAGO BAWAH</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-3.jpg');">
                                        <div class="travel-country">TROUIT CAFE</div>
                                        <div class="travel-location">CICENDO</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Popular-4.jpg');">
                                        <div class="travel-country">AMBORGIO PATISSERIE</div>
                                        <div class="travel-location">BANDUNG WETAN</div>
                                        <div class="travel-button mt-auto">
                                            <a href="details.html" class="btn btn-travel-details px-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p id="message"></p>
                    </div>
                </div>

            </div>
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