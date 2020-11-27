@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Dokumentasi Audit Mutu Internal
                        </div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border-right">Periode</th>
                                        <th class="border-right">Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audits as $audit)
                                    <tr class="text-center">
                                        <td class="border-right">
                                            {{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                        <td class="border-right">{{$audit->department->department_name}}</td>
                                        <td>
                                            <a href="{{ route('report.lihat',[$audit->id_audit]) }}"
                                                class="btn btn-behance">
                                                <span class="cil-address-book btn-icon mr-2"></span>Instrumen AMI
                                            </a>
                                            <a href="{{ route('finding.print',[$audit->id_audit]) }}"
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

@endsection
</div>
</div>

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })
</script>
@endsection
