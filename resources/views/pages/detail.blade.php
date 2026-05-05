@extends('layouts.app')

@section('title') FOOD HUNT - Detail Tempat Makan @endsection

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
                                Tempat Makan
                            </li>
                            <li class="breadcrumb-item active">
                                Detail {{ $place->title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $place->title }}</h1>
                        <p>{{ $place->location }}</p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="frontend/images/details.jpg" class="xzoom" id="xzoom-default" xoriginal="frontend/images/details.jpg">
                            </div>
                            <div class="xzoom-thumbs">
                                <a href="frontend/images/details.jpg">
                                    <img src="frontend/images/details.jpg" class="xzoom-gallery" width="128" xpreview="frontend/images/details.jpg">
                                </a>
                                <a href="frontend/images/details.jpg">
                                    <img src="frontend/images/details.jpg" class="xzoom-gallery" width="128" xpreview="frontend/images/details.jpg">
                                </a>
                                <a href="frontend/images/details.jpg">
                                    <img src="frontend/images/details.jpg" class="xzoom-gallery" width="128" xpreview="frontend/images/details.jpg">
                                </a>
                                <a href="frontend/images/details.jpg">
                                    <img src="frontend/images/details.jpg" class="xzoom-gallery" width="128" xpreview="frontend/images/details.jpg">
                                </a>
                                <a href="frontend/images/details.jpg">
                                    <img src="frontend/images/details.jpg" class="xzoom-gallery" width="128" xpreview="frontend/images/details.jpg">
                                </a>
                            </div>
                        </div>
                        <h2>Tentang Tempat Makan</h2>
                        <p>
                            {{ $place->about }}
                        </p>
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="frontend/images/ic_foods.png" alt="" class="features-image">
                                <div class="description">
                                    <h3>Menu Favorit</h3>
                                    <p>{{ $place->favorite_menu }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="frontend/images/ic_location.png" alt="" class="features-image">
                                <div class="description">
                                    <h3>Lokasi</h3>
                                    <p>{{ $place->location }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="frontend/images/ic_clock.png" alt="" class="features-image">
                                <div class="description">
                                    <h3>Jam Buka</h3>
                                    <p>{{ $place->open_hours }}</p>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div id="card-review" class="card card-details" style="margin-top: 24px; margin-bottom: 24px;">
                        @forelse($reviews as $review)
                        <div class="col-md-6">
                            <h4 class="list-group-item-heading"> {{ $review->user->name }} </h4>
                            <p class="list-group-item-text"> {{ $review->review }} </p>
                        </div>
                        @empty
                        <div class="col-md-6" id="text-empty">
                            <h4 class="list-group-item-heading"> No Review </h4>
                        </div>
                        @endforelse
                    </div>
                </div>
                @auth
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Beri Review</h2>
                        <form action="" method="post" id="form-review">
                            <div class="form-group" id="review-textarea">
                                <label for="about">Review</label>
                                <textarea id="about" name="about" rows="10" class="d-block w-100 form-control"></textarea>
                            </div>
                            <div class="form-group" style="margin-bottom: -5px;">
                                <label for="rating">Rating Bintang</label>
                            </div>
                            <div class="rating" style="margin-left: -3px;">
                                @csrf
                                <label>
                                    <input type="radio" name="stars" value="1" class="stars" {{ empty($rate) ? '' : ($rate->rate === 1 ? "checked" : '') }} {{ empty($rate) ? '' : 'disabled' }} />
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="2" class="stars" {{ empty($rate) ? '' : ($rate->rate === 2 ? "checked" : '') }} {{ empty($rate) ? '' : 'disabled' }} />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="3" class="stars" {{ empty($rate) ? '' :  ($rate->rate === 3 ? "checked" : '') }} {{ empty($rate) ? '' : 'disabled' }} />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="4" class="stars" {{ empty($rate) ? '' : ($rate->rate === 4 ? "checked" : '') }} {{ empty($rate) ? '' : 'disabled' }} />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="5" class="stars" {{ empty($rate) ? '' : ($rate->rate === 5 ? "checked" : '') }} {{ empty($rate) ? '' : 'disabled' }} />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                            </div>
                            <div class="form-group" style="margin-bottom: -10px;">
                                <label for="favourite">Tempat Favorit?</label>
                            </div>
                            <div class="container-love">
                                <fieldset>
                                    <input type="checkbox" id="favourite" class="sr-only" {{ empty($favorite) ? '' : 'checked' }}>
                                    <label for="favourite" aria-hidden="true">❤</label>
                                </fieldset>
                            </div>
                    </div>
                    <div class="join-container">
                        <button type="submit" class="btn btn-block btn-join-now mt-3 py-1">
                            Beri Review
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            @endauth
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

<script src="{{ url('frontend/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $("document").ready(function(event) {
        var idFavorite = "{{ empty($favorite) ? '' : $favorite->id }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".stars").click(function(event) {
            var rate = $(".stars:checked").val();

            $.ajax({
                type: "POST",
                url: "{{ route('detail.rating') }}",
                data: {
                    'food_place_id': "{{ $place->id }}",
                    'rating': rate
                },
                success: function(response) {
                    console.log(response);
                    $('.rating').click(false);
                    $('.stars').click(false);

                    $('.modal-title').replaceWith('Success');
                    $('#message').replaceWith('You rate ' + response['rating'].rate + ' to {{ $place->title }}');
                    $('#myModal').modal();
                },
                error: function(error) {
                    console.log(error);

                    $('.modal-title').replaceWith('Error');
                    $('#message').replaceWith('Failed to give rating');
                    $('#myModal').modal();
                }
            });
        });

        $('#favourite').on('click', function() {
            $(':checkbox').each(function() {
                var ischecked = $(this).is(":checked");
                if (ischecked) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('detail.set.favorite') }}",
                        data: {
                            'food_place_id': "{{ $place->id }}",
                        },
                        success: function(response) {
                            console.log(response);
                            idFavorite = response['favorite'].id;

                            $('.modal-title').replaceWith('Success');
                            $('#message').replaceWith('{{ $place->title }} is your favorite place!');
                            $('#myModal').modal();
                        },
                        error: function(error) {
                            console.log(error);
                            $('.modal-title').replaceWith('Error');
                            $('#message').replaceWith('Failed to add to your favorite.');
                            $('#myModal').modal();
                        }
                    });
                } else {
                    $.ajax({
                        type: "DELETE",
                        url: "/detail/favorite/" + idFavorite,
                        data: {
                            'food_place_id': "{{ $place->id }}",
                        },
                        success: function(response) {
                            console.log(response);

                            $('.modal-title').replaceWith('Success');
                            $('#message').replaceWith('{{ $place->title }} was deleted from your favorite places.');
                            $('#myModal').modal();
                        },
                        error: function(error) {
                            console.log(error);
                            $('.modal-title').replaceWith('Error');
                            $('#message').replaceWith('Failed to delete from your favorite.');
                            $('#myModal').modal();
                        }
                    });
                }
            });
        });
        $('#form-review').submit(function(event) {
            $(".form-group").removeClass("has-error");
            $(".help-block").remove();
            event.preventDefault();
            var about = $('#about').val();

            if (about == "") {
                $(".form-group#review-textarea").addClass("has-error");
                $(".form-group#review-textarea").append(
                    '<div class="help-block text-danger"> Review is required </div>'
                );
                return
            }

            $.ajax({
                type: "POST",
                url: "{{ route('detail.review') }}",
                data: {
                    'food_place_id': "{{ $place->id }}",
                    'review': about
                },
                success: function(response) {
                    console.log(response);

                    $('.modal-title').replaceWith('Success');
                    $('#message').replaceWith('Success add review');
                    $('#myModal').modal();

                    $('#text-empty').replaceWith('');
                    $('#card-review').append(
                        '<div class="col-md-6">' +
                        '<h4 class="list-group-item-heading"> ' + response['user'] + ' </h4>' +
                        '<p class="list-group-item-text">' + response['review'].review + '</p>' +
                        '</div>'
                    );
                    $('#about').val("")
                },
                error: function(error) {
                    console.log(error);
                    $('.modal-title').replaceWith('Error');
                    $('#message').replaceWith('Failed add review');
                    $('#myModal').modal();
                }
            })
        });
    });
</script>

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

    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>
@endpush