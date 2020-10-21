@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('periodeStandard.add')}}">
                            Tambahkan periode standar
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Nama Standar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($audit_instruments as $instrument)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($instrument->periode->audit_start_at)->format('Y')}}</td>
                                        <td>{{$instrument->standard->name}}</td>
                                        <td>
                                            <form action="{{ url('instrument/'.$instrument->id_instrument) }}" method="post" class="d-inline">
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
