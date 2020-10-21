@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>DOSEN UNAND</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('lecturer.add')}}">
                            Tambahkan Dosen
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telephone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($lecturers as $lecturer)
                                    <tr>
                                        <td>{{$lecturer->user->name}}</td>
                                        <td>{{$lecturer->address}}</td>
                                        <td>{{$lecturer->telephone}}</td>
                                        <td>
                                            <form action="{{ route('lecturer.destroy',[$lecturer->id_lecturer]) }}" method="post" class="d-inline">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>
</div>

@section('javascript')

@endsection
