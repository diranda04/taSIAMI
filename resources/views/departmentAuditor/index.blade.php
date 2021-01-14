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
                                        <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                            data-target="#editDepartmentAudit"
                                            data-id_department_audit="{{$department_audit->id_department_audit}}"
                                            data-auditor_id="{{$department_audit->auditor_id}}"
                                            data-audit_id="{{$department_audit->audit_id}}">
                                            <span class="cil-pencil btn-icon mr-2"></span>Edit
                                        </a>
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
                                    <select name="auditorSelect" class="form-control" id="exampleFormControlSelect3" required>
                                        <option selected disabled value=""></option>
                                        @foreach ($auditors as $auditor)
                                        <option value="{{$auditor->id_auditor}}">{{$auditor->user->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Audit Prodi</label>
                                    <select name="auditSelect" class="form-control" id="exampleFormControlSelect2" required>
                                        <option selected disabled value="" ></option>
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

<!-- Modal Edit Penempatan Auditor-->
<div class="modal" id="editDepartmentAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Penempatan Auditor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('departmentAudit.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id_department_audit" name="id_department_audit">
                    <div class="form-group">
                        <label for="">Auditor</label>
                        <select name="auditorselect" class="form-control" id="edit_auditor">
                            @foreach ($auditors as $auditor)
                            <option value="{{ $auditor->id_auditor }}"
                            >{{ $auditor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Audit Prodi</label>
                        <select name="auditselect" class="form-control" id="edit_audit">
                            @foreach ($audits as $audit)
                            <option value="{{$audit->id_audit}}">
                                {{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y') }}
                                {{$audit->department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('javascript')
<script>
    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id_department_audit = $(this).data("id_department_audit");
            var auditor_id = $(this).data("auditor_id");
            var audit_id = $(this).data("audit_id");
            $("#edit_id_department_audit").val(id_department_audit);
            // $("#edit_auditor").val(auditorselect);
            // $("#edit_audit").val(auditselect);
            console.log(auditor_id);

            $("#edit_auditor > option").each(function(){
                if(this.value == auditor_id)
                {
                    $(this).attr("selected","selected");
                }
            });

            $("#edit_audit > option").each(function(){
                if(this.value == audit_id)
                {
                    $(this).attr("selected","selected");
                }
            });

        })
    })
</script>
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
