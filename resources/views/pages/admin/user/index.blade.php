@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah User
            </a>
        </div>



        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->roles }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post" class="d-inline">
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