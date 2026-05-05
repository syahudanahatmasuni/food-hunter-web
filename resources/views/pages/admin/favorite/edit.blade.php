@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Favorite</h1>
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
                <form action="{{ route('favorite.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
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
                        <label for="food_place_id">Tempat Makan Favorite</label>
                        <select class="form-control" name="food_place_id" required readonly>
                          @foreach ($food_places as $food_place)
                            <option value="{{ $food_place->id }}">
                                {{ $food_place->title }}
                            </option>
                          @endforeach
                         </select>
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