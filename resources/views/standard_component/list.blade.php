@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>KOMPONEN STANDAR AUDIT : {{$standard->name}}</div></h5>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addStandarComponent">
                                <span class="cil-plus btn-icon mr-2"></span>Tambahkan Komponen Standar
                            </button>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right" style="width:5%">No</th>
                                        <th class="border-right" style="width:60%">Komponen Standar</th>
                                        <th style="width:35%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($standard_components as $standard_component)
                                    <tr>
                                        <td class="border-right">{{ $loop->iteration }}.</td>
                                        <td class="border-right text-left">{{$standard_component->desc}}</td>
                                        <td>
                                            <a href="{{ route('question.detail',[$standard_component->id_standard_component]) }}"
                                                class="btn btn-success">
                                                <span class="cil-description btn-icon mr-2"></span>Indikator Penilaian
                                            </a>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editStandardComponent"
                                                data-id_standard_component="{{$standard_component->id_standard_component}}"
                                                data-desc="{{$standard_component->desc}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form
                                                action="{{ route('component.destroy',[$standard_component->id_standard_component]) }}"
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
            </div>
        </div>
    </div>
</div>
@endsection
</div>
<div class="modal fade" id="addStandarComponent" tabindex="-1" role="dialog" aria-labelledby="addStandarLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStandarLabel">Tambah Komponen Standar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('component.post',[$id_standard])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan</label>
                        <textarea type="text" name="desc" class="form-control" id="desc" placeholder="" cols="30"
                            rows="3" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <span class="cil-save btn-icon mr-2"></span>Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Standard -->
<div class="modal fade" id="editStandardComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Komponen Standar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('component.edit',[$id_standard])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_standard_component">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Keterangan</label>
                        <textarea type="text" class="form-control-file" id="edit_desc" name="desc" cols="30"
                            rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <span class="cil-save btn-icon mr-2"></span>Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('javascript')
<script>
    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id_standard_component = $(this).data("id_standard_component");
            var desc = $(this).data("desc");
            $("#edit_id").val(id_standard_component);
            $("#edit_desc").val(desc);
            console.log(id_standard_component);
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
