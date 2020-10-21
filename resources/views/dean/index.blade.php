@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Dekan</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('dean.add')}}">
                            Atur Dekan
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Fakultas</th>
                                        <th>Mulai Menjabat</th>
                                        <th>Akhir Menjabat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($deans as $dean)
                                    <tr>
                                        <td>{{$dean->lecturer->user->name}}</td>
                                        <td>{{$dean->faculty->name}}</td>
                                        <td>{{$dean->start_at}}</td>
                                        <td>{{$dean->end_at}}</td>
                                        <td>
                                            <form action="{{ route('dean.destroy',[$dean->id_dean]) }}" method="post" class="d-inline">
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
