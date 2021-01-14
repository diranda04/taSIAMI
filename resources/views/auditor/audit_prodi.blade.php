@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Audit Mutu Internal</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border-right">Periode</th>
                                        <th class="border-right">Prodi</th>
                                        <th class="border-right">Auditor</th>
                                        <th class="border-right">Skor Audit</th>
                                        <th class="border-right">Temuan Audit</th>
                                        <th>Permintaan Tindak Koreksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($auditors as $auditor)
                                <!-- @php $audit = $auditor->audit; @endphp -->
                                    <tr class="text-center">
                                        <td class="border-right">{{Carbon\Carbon::parse($auditor->audit_start_at)->format('Y')}}</td>
                                        <td class="border-right">{{$auditor->department_name}}</td>
                                        <td>
                                            @foreach($test->where('id_audit',$auditor->id_audit) as $data_auditor)
                                            <ul>{{ $data_auditor->name }}</ul>
                                            @endforeach
                                        </td>
                                        <td class="border-right">
                                        <a href="{{ route('skoraudit.view',[$auditor->id_audit]) }}" class="btn btn-danger">
                                        <span class="cil-pencil btn-icon mr-2"></span> Isi
                                        </a></td>
                                        <td class="border-right">
                                        <a href="{{ route('finding.detail',[$auditor->id_audit]) }}" class="btn btn-success">
                                        <span class="cil-description btn-icon mr-2"></span>Isi Temuan audit
                                        </a></td>
                                        <td>
                                        <a href="{{ route('auditor.devience',[$auditor->id_audit]) }}" class="btn btn-primary">
                                        <span class="cil-pencil btn-icon mr-2"></span> PTK-Keadaan Menyimpang
                                        </a>
                                        <a href="{{ route('auditor.ptk',[$auditor->id_audit]) }}" class="btn btn-warning">
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
@endsection
</div>
</div>

@section('javascript')

@endsection
