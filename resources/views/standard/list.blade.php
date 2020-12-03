@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>STANDAR AMI</div></h5>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addStandard">
                                <span class="cil-plus btn-icon mr-2"></span>Tambah standar audit
                            </button>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right" style="width:5%">No</th>
                                        <th class="border-right" style="width:60%">Standar</th>
                                        <th style="width:35%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($standards as $standard)
                                    <tr>
                                        <th class="border-right" scope="row">{{ $loop->iteration }}.</th>
                                        <td class="border-right">{{$standard->name}}</td>
                                        <td>
                                            <a href="{{ route('standard.detail',[$standard->id_standard]) }}"
                                                class="btn btn-success"><span class="cil-description btn-icon mr-2"></span>Komponen Standar
                                            </a>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editStandard"
                                                data-id_standard="{{$standard->id_standard}}"
                                                data-name="{{$standard->name}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form action="{{ route('standard.destroy',[$standard->id_standard]) }}"
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
                            {{ $standards->links() }}
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
<!-- Modal Add Standard -->
<div class="modal fade" id="addStandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Standar Audit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('standard.post',[$id_instrument])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Keterangan</label>
                        <input type="text" class="form-control-file" id="name" name="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"><spanclass="cil-save btn-icon mr-2"></span>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Standard -->
<div class="modal fade" id="editStandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Standar Audit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('standard.edit',[$id_instrument])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_standard">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Keterangan</label>
                        <input type="text" class="form-control-file" id="edit_name" name="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"><span
                        class="cil-save btn-icon mr-2"></span>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('javascript')
<script>
    $(document).ready(function () {

        $(document).on("click", "#editButton", function () {
            var id_standard = $(this).data("id_standard");
            var name = $(this).data("name");
            $("#edit_id").val(id_standard);
            $("#edit_name").val(name);
            console.log(id_standard);
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
