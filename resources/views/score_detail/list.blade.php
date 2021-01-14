@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('message')}}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i><strong>Detail Pengisian Skor : </strong> {{$q->desc}}</div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addDetail">
                                <span class="cil-plus btn-icon mr-2"></span>Tambah Detail Pengisian Skor
                            </button>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right" style="width:10%">Skor</th>
                                        <th class="border-right" style="width:55%">Keterangan</th>
                                        <th style="width:35%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($score_details as $score_detail)
                                    <tr>
                                        <td class="border-right" >{{$score_detail->score}}</td>
                                        <td class="border-right text-left">{{$score_detail->desc}}</td>
                                        <td>
                                            <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                                data-target="#editDetail" data-id_score_detail="{{$score_detail->id_score_detail}}" data-desc="{{$score_detail->desc}}">
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                            </a>
                                            <form action="{{ route('detail.destroy',[$score_detail->id_score_detail]) }}"
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

<!-- Modal Tambah  Detail pengisian Skor -->
<div class="modal fade" id="addDetail" tabindex="-1" role="dialog" aria-labelledby="addDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDetailLabel">Tambah Detail Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('detail.post',[$id_question])}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <select name="score" class="form-control" id="score">
                        <option selected="">0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan</label>
                        <textarea type="text" name="desc" class="form-control" id="desc" placeholder="" cols="30"
                            rows="5" required></textarea>
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

<!-- Modal Edit Detail Penilaian -->
<div class="modal fade" id="editDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Detail Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('detail.edit', [$id_question])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_score_detail">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Keterangan</label>
                        <textarea type="text" class="form-control" id="edit_name" name="desc" cols="30" rows="5"></textarea>
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
            var id_score_detail = $(this).data("id_score_detail");
            var desc = $(this).data("desc");
            $("#edit_id").val(id_score_detail);
            $("#edit_name").val(desc);
            console.log(id_score_detail);
        })
    })
</script>
@endsection
