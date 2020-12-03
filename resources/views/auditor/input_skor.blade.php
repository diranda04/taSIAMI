@extends('layouts.app')

@section('content')
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
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>AUDIT MUTU INTERNAL :
                            {{$department->department_name}}</div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            @foreach ($standards as $standard)
                            <tr>
                                <th colspan="5">{{$standard->name}}</th>
                            </tr>
                            @foreach ($standard->standardComponent as $sc)
                            <tr>
                                <th colspan="5">{{$sc->desc}}</th>
                            </tr>
                            <tr class="text-center">
                                <th class="align-middle border-right">No</th>
                                <th class="align-middle border-right">Indikator Penilaian</th>
                                <th class="align-middle border-right">Skor Taksiran</th>
                                <th class="align-middle border-right">Skor Audit</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                            <tbody>
                                @foreach ($sc->question as $q)
                                <tr>
                                    <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                    <td class="border-right">{{$q->desc}}</td>
                                    <td class="text-center border-right">
                                        {{$q->nilaiFromAudit($id_audit)->first() ? $q->nilaiFromAudit($id_audit)->first()->score_auditee : ""}}
                                    </td>
                                    <td class="text-center border-right">
                                        {{$q->nilaiFromAudit($id_audit)->first() ? $q->nilaiFromAudit($id_audit)->first()->score_auditor : ""}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#viewDetail" id='detailSkor' data-id="{{$q->id_question}}"
                                            onClick="setIdQuestion('{{$q->id_question}}')">
                                            <i class="cil-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
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
@endsection
</div>

<!-- view add score -->
<div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detial Pengisian Skor Audit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Skor</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="body_table">
                    </tbody>
                </table>
                <form action="#" id="auditorScore" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tambah Skor</label>
                        <input type="int" name="score_auditor" class="form-control" id="score_auditor" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" onClick="addScore()" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@section('javascript')
<script>
    function setIdQuestion(id_question) {
        baseUrl = "{{url('/')}}" + "/skor_audit" + "/{{$id_audit}}" + "/" + id_question;
    }

    function addScore(id_question) {
        $('#addScore').modal('show');
        $('#auditorScore').attr('action', baseUrl);
    }
    $(document).on("click", "#detailSkor", function () {
        var id = $(this).data("id");
        var base_url = "{{ url('/') }}";
        var rows = '';

        $.ajax({
            method: "GET",
            dataType: 'json',
            url: base_url + "/skor_audit/get_data/" + id,
            success: function (data) {
                var detail = data.data_score;
                $.each(detail, function (key, value) {
                    rows = rows + "<tr>";
                    rows = rows + "<td>" + value.score + "</td>";
                    rows = rows + "<td>" + value.desc + "</td>";
                    rows = rows + "</tr>";
                })
                $("#body_table").html(rows);
            }
        });
    });

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
