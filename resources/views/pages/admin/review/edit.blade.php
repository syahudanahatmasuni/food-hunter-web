@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Review</h1>
        </div>



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('review.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="food_place_id">Tempat Makan</label>
                        <select class="form-control" name="food_place_id" required readonly>
                          <option value="{{ $item->food_place_id }}">Jangan Diubah</option>
                          @foreach ($food_places as $food_place)
                            <option value="{{ $food_place->id }}">
                                {{ $food_place->title }}
                            </option>
                          @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select class="form-control" name="user_id" required readonly>
                          <option value="{{ $item->user_id }}">Jangan Diubah</option>
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                          @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea class="d-block w-100 form-control" name="review" rows="10" placeholder="Review">{{ $item->review }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="rate">Rating (Between 1 and 5)</label>
                        <input type="number" min="1" max="5" step="0.1" class="form-control" name="rate" placeholder="Rating" value="{{ $item->rate }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
               
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection