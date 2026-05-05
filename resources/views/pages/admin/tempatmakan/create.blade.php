@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Tempat Makan</h1>
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
                <form action="{{ route('tempatmakan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" required>
                          <option value="">Pilih Kategori</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                          @endforeach
                         </select>
                      </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" step="0.00000000001" class="form-control" name="latitude" placeholder="Latitude" value="{{ old('latitude') }}">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number" step="0.00000000001" class="form-control" name="longitude" placeholder="Longitude" value="{{ old('longitude') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="d-block w-100 form-control" name="about" rows="10" placeholder="About" value="{{ old('about') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="favorite_menu">Favourite Menu</label>
                        <input type="text" class="form-control" name="favorite_menu" placeholder="Favourite Menu" value="{{ old('favorite_menu') }}">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}">
                    </div>
                    <div class="form-group">
                        <label for="open_hours">Open Hours</label>
                        <input type="text" class="form-control" name="open_hours" placeholder="Open Hours" value="{{ old('open_hours') }}">
                    </div>
                    <div class="form-group">
                        <label for="cover">Image</label>
                        <input type="file" class="form-control" name="cover" placeholder="Image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
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