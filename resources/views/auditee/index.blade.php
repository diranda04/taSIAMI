@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Ketua Jurusan</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('auditee.add')}}">
                            Atur Ketua Jurusan
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Mulai Menjabat</th>
                                        <th>Akhir Menjabat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($auditees as $auditee)
                                    <tr>
                                        <td>{{$auditee->lecturer->user->name}}</td>
                                        <td>{{$auditee->department->name}}</td>
                                        <td>{{$auditee->start_at}}</td>
                                        <td>{{$auditee->end_at}}</td>
                                        <td>
                                            <form action="{{ route('auditee.destroy',[$auditee->id_auditee]) }}" method="post" class="d-inline">
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
