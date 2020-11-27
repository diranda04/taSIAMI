@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>Audit Mutu Internal</div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th class="border-right">Periode</th>
                                    <th class="border-right">Prodi</th>
                                    <th class="border-right">Perkiraan Skor Audit</th>
                                    <th class="border-right">Berita Acara</th>
                                    <th class="border-right">Temuan Audit</th>
                                    <th>Permintaan Tindak Koreksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($auditees as $auditee)
                                <!-- @php $audit = $auditee->audit; @endphp -->
                                <tr class="text-center">
                                    <td class="border-right">
                                        {{Carbon\Carbon::parse($auditee->audit_start_at)->format('Y')}}</td>
                                    <td class="border-right">{{$auditee->department_name}}</td>
                                    <td class="border-right">
                                        <a href="{{ route('skortaksiran.view',[$auditee->id_audit]) }}"
                                            class="btn btn-danger">
                                            <span class="cil-pencil btn-icon mr-2"></span>Isi Skor
                                        </a></td>
                                    <td class="border-right"><a
                                            href="{{ route('beritaAcara.audit',[$auditee->department_id]) }}"
                                            class="btn btn-secondary">
                                            <span class="cil-print btn-icon mr-2"></span>Cetak
                                        </a></td>
                                    <td class="border-right"><a href="{{ route('finding.print',[$auditee->id_audit]) }}"
                                            class="btn btn-success">
                                            <span class="cil-description btn-icon mr-2"></span>Temuan audit
                                        </a></td>
                                    <td>
                                        <a href="{{ route('auditee.devience',[$auditee->id_audit]) }}"
                                            class="btn btn-primary">
                                            <span class="cil-pencil btn-icon mr-2"></span>Isi PTK
                                        </a>
                                        <a href="{{route('ptk.print',[$auditee->id_audit])}}" class="btn btn-secondary">
                                            <span class="cil-print btn-icon mr-2"></span>Cetak PTK
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
