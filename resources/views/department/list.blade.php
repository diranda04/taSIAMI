@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR PROGRAM STUDI-{{$faculties->name}}</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Prodi</th>
                                        <th class="text-center">Akreditasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                    <tr>
                                        <th class="text-center" scope="row">{{$loop->iteration}}.</th>
                                        <td class="text-center">{{$department->department_name}}</td>
                                        <td class="text-center">{{$department->accreditation}}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editDepartment"
                                                data-id_department="{{$department->id_department}}"
                                                data-department_name="{{$department->department_name}}"
                                                data-accreditation="{{$department->accreditation}}"
                                                data-sk_num="{{$department->sk_num}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form
                                                action="{{ route('department.destroy',[$department->id_department]) }}"
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
                        <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Program Studi</div>
                        <div class="card-body">
                            <form action="{{route('prodi.post',[$id_faculty])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Nama</label>
                                    <input type="text" class="form-control-file" id="department_name"
                                        name="department_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Akreditasi</label>
                                    <input type="text" class="form-control-file" id="accreditation" name="accreditation" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">No.SK/Link</label>
                                    <input type="text" class="form-control-file" id="sk_num" name="sk_num" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>
</div>

<!-- Modal Edit Program Studi -->

<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('prodi.edit',[$id_faculty])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_department">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nama Prodi</label>
                        <input type="text" class="form-control-file" id="edit_name" name="department_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Akreditasi</label>
                        <input type="text" class="form-control-file" id="edit_accreditation" name="accreditation">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">No.SK/Link</label>
                        <input type="text" class="form-control-file" id="edit_sk_num" name="sk_num">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            var id_department = $(this).data("id_department");
            var department_name = $(this).data("department_name");
            var accreditation = $(this).data("accreditation");
            var sk_num = $(this).data("sk_num");
            $("#edit_id").val(id_department);
            $("#edit_name").val(department_name);
            $("#edit_accreditation").val(accreditation);
            $("#edit_sk_num").val(sk_num);
            console.log(id_department);
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
