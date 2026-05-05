@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tempat Makan</h1>
            <a href="{{ route('tempatmakan.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Tempat Makan
            </a>
        </div>



        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>About</th>
                                <th>Favourite Menu</th>
                                <th>Location</th>
                                <th>Open Hours</th>
                                <th>Image</th>
                                <th>Rating</th>
                                <th>Count Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->latitude }}</td>
                                <td>{{ $item->longitude }}</td>
                                <td>{{ $item->about }}</td>
                                <td>{{ $item->favorite_menu }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->open_hours }}</td>
                                <td>
                                    <img src="{{ url($item->cover) }}" alt="" style="width: 150px" class="img-thumbnail">
                                </td>
                                <td>{{ $item->rating }}</td>
                                <td>{{ $item->count_rating }}</td>
                                <td>
                                    <a href="{{ route('tempatmakan.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('tempatmakan.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @empty
                               <tr>
                                   <td colspan="10" class="text-center">
                                       Data Kosong
                                   </td>
                               </tr>
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection