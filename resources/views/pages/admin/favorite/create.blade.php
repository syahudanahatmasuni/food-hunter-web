@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Favorite</h1>
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
                <form action="{{ route('favorite.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select class="form-control" name="user_id" required>
                          <option value="">Pilih User</option>
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                          @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="food_place_id">Tempat Makan</label>
                        <select class="form-control" name="food_place_id" required>
                          <option value="">Pilih Tempat Makan</option>
                          @foreach ($food_places as $food_place)
                            <option value="{{ $food_place->id }}">
                                {{ $food_place->title }}
                            </option>
                          @endforeach
                         </select>
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