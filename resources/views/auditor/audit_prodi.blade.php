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
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Prodi</th>
                                        <th class="text-center">Isi Skor Audit</th>
                                        <th class="text-center">Temuan Audit</th>
                                        <th class="text-center">Permintaan Tindak Koreksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($auditors as $auditor)
                                @php $audit = $auditor->audit; @endphp

                                    <tr>
                                        <td class="text-center">{{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                        <td class="text-center">{{$audit->department->name}}</td>
                                        <td class="text-center">
                                        <a href="{{ route('skoraudit.view',[$audit->id_audit]) }}" class="btn btn-danger">
                                        <span class="cil-pencil btn-icon mr-2"></span> Isi
                                        </a></td>
                                        <td class="text-center">
                                        <a href="{{ route('finding.detail',[$audit->id_audit]) }}" class="btn btn-success">
                                        <span class="cil-description btn-icon mr-2"></span>Isi Temuan audit
                                        </a></td>
                                        <td class="text-center">
                                        <a href="{{ route('auditor.devience',[$audit->id_audit]) }}" class="btn btn-primary">
                                        <span class="cil-pencil btn-icon mr-2"></span> PTK-Keadaan Menyimpang
                                        </a>
                                        <a href="{{ route('auditor.ptk',[$audit->id_audit]) }}" class="btn btn-warning">
                                        <span class="cil-description btn-icon mr-2"></span>Lihat PTK
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
