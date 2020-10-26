@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message')}}
                </div>
                @endif
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Daftar User</div>
                        <div class="card-body">
                        <a class="btn btn-primary" role="button" href="{{route('user.add')}}">
                                Add User
                        </a>
                        <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                    <tr>
                                        <th scope="row">{{$users->firstItem()+$no }}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>
                                        <a href="" class="btn btn-primary" >
                                            <i class="cil-pencil"></i>
                                        </a>
                                            <form action="{{ route('user.destroy',[$user->id]) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    <i class="cil-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        <!-- /.row-->
    </div>
</div>

@endsection
</div>
</div>
</div>


<!-- Modal Edit User -->


@section('javascript')

@endsection
