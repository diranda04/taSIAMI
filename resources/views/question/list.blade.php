@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i><strong>Indikator Penilaian AMI : </strong> {{$ks->desc}}</div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addQuestion">
                                <span class="cil-plus btn-icon mr-2"></span>Tambah Indikator Penilaain
                            </button>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right" style="width:5%">No</th>
                                        <th class="border-right" style="width:60%">Indikator Penilaian</th>
                                        <th style="width:35%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($questions as $question)
                                    <tr>
                                        <th class="border-right" scope="row">{{ $loop->iteration }}.</th>
                                        <td class="border-right text-left">{{$question->desc}}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('score_detail.detail',[$question->id_question]) }}"
                                                class="btn btn-success">
                                                <span class="cil-input btn-icon mr-2"></span>Detail pengisian skor
                                            </a>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editQuestion"
                                                data-id_question="{{$question->id_question}}"
                                                data-desc="{{$question->desc}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form action="{{ route('question.destroy',[$question->id_question]) }}"
                                                method="post" onclick="return confirm('Anda yakin menghapus data ?')"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-youtube">
                                                    <span class="cil-trash btn-icon mr-2"></span>Hapus</button>
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

<!-- Modal Tambah Indikator Penilaian -->
<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="addStandardLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStandardLabel">Tambah Indikator Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('question.post',[$id_standard_component])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan</label>
                        <textarea type="int" name="desc" class="form-control" id="desc" placeholder="" cols="30" rows="5"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Indikator Penilaian -->
<div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Indikator Penialaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('question.edit',[$id_standard_component])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="hidden" class="form-control-file" id="edit_id" name="id_question">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Keterangan</label>
                            <textarea type="text" class="form-control-file" id="edit_desc" name="desc" cols="30"
                            rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @section('javascript')
    <script>
        $(document).ready(function () {
            $(document).on("click", "#editButton", function () {
                var id_question = $(this).data("id_question");
                var desc = $(this).data("desc");
                $("#edit_id").val(id_question);
                $("#edit_desc").val(desc);
                console.log(id_question);
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
