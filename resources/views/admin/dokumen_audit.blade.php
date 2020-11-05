@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Dokumentasi Audit Mutu Internal
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Prodi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audits as $audit)
                                    <tr>
                                        <td class="text-center">
                                            {{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                        <td class="text-center">{{$audit->department->department_name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('report.lihat',[$audit->id_audit]) }}"
                                                class="btn btn-behance">
                                                <span class="cil-print btn-icon mr-2"></span>Instrumen AMI
                                            </a>
                                            <a href="{{ route('adminFinding.print',[$audit->id_audit]) }}"
                                                class="btn btn-reddit">
                                                <span class="cil-print btn-icon mr-2"></span>Temuan audit
                                            </a>
                                            <a href="{{route('ptkadmin.print',[$audit->id_audit])}}" class="btn btn-tumblr">
                                                <span class="cil-print btn-icon mr-2"></span>Permintaan Tindakan Koreksi
                                            </a>
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
