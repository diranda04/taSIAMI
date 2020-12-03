@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>AUDITOR PROGRAM STUDI</div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th class="border-right">Auditor</th>
                                    <th class="border-right">Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department_audits as $department_audit)
                                <tr class="text-center">
                                    <td class="border-right">{{$department_audit->auditor->user->name}}</td>
                                    <td class="border-right">
                                        {{Carbon\Carbon::parse($department_audit->audit->periode->audit_start_at)->format('Y') }}-{{$department_audit->audit->department->department_name}}
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('departmentAudit.destroy',[$department_audit->id_department_audit]) }}"
                                            method="post" onclick="return confirm('Anda yakin menghapus data ?')"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-youtube">
                                                <span class="cil-trash btn-icon mr-2"></span>Hapus
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
            <div class="col-sm-4">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Auditor Prodi</div>
                        <div class="card-body">
                            <form action="{{route('departmentAudit.post')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Auditor</label>
                                    <select name="auditorSelect" class="form-control" id="exampleFormControlSelect3">
                                        <option selected disabled value=""></option>
                                        @foreach ($auditors as $auditor)
                                        <option value="{{$auditor->id_auditor}}">{{$auditor->user->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Audit Prodi</label>
                                    <select name="auditSelect" class="form-control" id="exampleFormControlSelect2">
                                        <option selected disabled value=""></option>
                                        @foreach ($audits as $audit)
                                        <option value="{{$audit->id_audit}}">
                                            {{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y') }}
                                            {{$audit->department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><span
                                        class="cil-save btn-icon mr-2"></span>Simpan</button>
                        </div>
                        </form>
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
    $(document).ready(function () {
        var flash = "{{ Session::has('sukses') }}";
        if (flash) {
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })

</script>
@endsection
