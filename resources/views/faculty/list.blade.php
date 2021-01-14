@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR FAKULTAS</div></h5>
                        <div class="card-body">
                            <table class="border table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="border-right text-center">No</th>
                                        <th class="border-right text-center">Nama Fakultas</th>
                                        <th class="border-right text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                    <tr>
                                        <th scope="row" class="border-right text-center">{{$loop->iteration }}.</th>
                                        <td class="border-right">{{$faculty->name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('faculty.department',[$faculty->id_faculty]) }}"
                                                class="btn btn-success"><span class="cil-education btn-icon mr-2"></span>Daftar Prodi</a>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editFaculty" data-id_faculty="{{$faculty->id_faculty}}"
                                                data-name="{{$faculty->name}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form action="{{ route('faculty.destroy',[$faculty->id_faculty]) }}"
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
                            {{ $faculties->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Fakultas</div></h5>
                        <div class="card-body">
                            <form action="{{route('faculty.post')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Nama Fakultas</label>
                                    <input type="text" class="form-control-file" id="name" name="name" required>
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

<!-- Modal Edit Fakultas-->
<div class="modal" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('faculty.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_faculty">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nama Fakultas</label>
                        <input type="text" class="form-control-file" id="edit_name" name="name">
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
            var id_faculty = $(this).data("id_faculty");
            var name = $(this).data("name");
            $("#edit_id").val(id_faculty);
            $("#edit_name").val(name);
            console.log(id_faculty);
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
