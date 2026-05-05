@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
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
                <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="food_place_id">Tempat Makan</label>
                        <select class="form-control" name="food_place_id" required readonly>
                          <option value="{{ $item->food_places_id }}">Jangan Diubah</option>
                          @foreach ($food_places as $food_place)
                            <option value="{{ $food_place->id }}">
                                {{ $food_place->title }}
                            </option>
                          @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Image</label>
                        <input type="file" class="form-control" name="url" placeholder="Image">
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