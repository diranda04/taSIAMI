@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR DOSEN UNAND</div></h5>
                        <div class="card-body">
                        <a class="btn btn-primary btn-block" role="button" href="{{route('lecturer.add')}}">
                        <span class="cil-user-follow btn-icon mr-2"></span>Tambahkan Dosen
                        </a>
                        <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right">No</th>
                                        <th class="border-right">Nama</th>
                                        <th class="border-right">Alamat</th>
                                        <th class="border-right">Telephone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                @foreach ($lecturers as $lecturer)
                                    <tr>
                                        <td class="border-right">{{$loop->iteration}}.</td>
                                        <td class="border-right">{{$lecturer->user->name}}</td>
                                        <td class="border-right">{{$lecturer->address}}</td>
                                        <td class="border-right">{{$lecturer->telephone}}</td>
                                        <td>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editLecturer" data-id_lecturer="{{$lecturer->id_lecturer}}"
                                                data-address="{{$lecturer->address}}"
                                                data-telephone="{{$lecturer->telephone}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form action="{{ route('lecturer.destroy',[$lecturer->id_lecturer]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')" class="d-inline">
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
                            {{ $lecturers->links() }}
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

<!-- Modal Edit User -->
<div class="modal fade" id="editLecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 class="text-center">{{$lecturer->user->name}}</h5>
            <br>
                <form action="{{route('lecturer.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                        <input type="hidden" class="form-control-file" id="edit_id_lecturer" name="id_lecturer">
                    <div class="form-group row">
                        <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_telephone" name="telephone">
                        </div>
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
            var id_lecturer = $(this).data("id_lecturer");
            var address = $(this).data("address");
            var telephone = $(this).data("telephone");
            $("#edit_id_lecturer").val(id_lecturer);
            $("#edit_address").val(address);
            $("#edit_telephone").val(telephone);
            console.log(id_lecturer);
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
