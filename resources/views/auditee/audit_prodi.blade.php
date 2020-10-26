@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Audit Mutu Internal</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Prodi</th>
                                        <th class="text-center">Perkiraan Skor Audit</th>
                                        <th class="text-center">Berita Acara</th>
                                        <th class="text-center">Temuan Audit</th>
                                        <th class="text-center">Permintaan Tindak Koreksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($auditees as $auditee)
                                    @php $audit = $auditee->audit; @endphp
                                    <tr class="text-center">
                                        <td class="text-center">{{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                        <td class="text-center">{{$audit->department->name}}</td>
                                        <td>
                                        <a href="{{ route('skortaksiran.view',[$audit->id_audit]) }}" class="btn btn-danger">
                                        <span class="cil-pencil btn-icon mr-2"></span>Isi
                                        </a></td>
                                        <td><a href="{{ route('beritaAcara.audit',[$audit->department_id]) }}" class="btn btn-secondary">
                                        <span class="cil-print btn-icon mr-2"></span>Cetak
                                        </a></td>
                                        <td><a href="{{ route('finding.lihat',[$audit->id_audit]) }}" class="btn btn-success">
                                        <span class="cil-description btn-icon mr-2"></span>Temuan audit
                                        </a></td>
                                        <td>
                                        <a href="{{ route('auditee.devience',[$audit->id_audit]) }}" class="btn btn-primary">
                                        <span class="cil-pencil btn-icon mr-2"></span> PTK
                                        </a>
                                        <a href="{{route('ptk.view',[$audit->id_audit])}}" class="btn btn-warning">
                                        <span class="cil-description btn-icon mr-2"></span>Lihat PTK
                                        </a>
                                        <a href="{{route('ptk.print',[$audit->id_audit])}}" class="btn btn-secondary">
                                        <span class="cil-print btn-icon mr-2"></span>Print PTK
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
