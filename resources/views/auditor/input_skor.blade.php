@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <!-- /.col-->
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
                        <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Indikator Penilaian</th>
                                            <th>Score Taksiran</th>
                                            <th>Score Auditor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($questions as $question)
                                    <?php $no++ ;?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$question->desc}}</td>
                                        <td>{{$question->score_auditee}}</td>
                                        <td>{{$question->score_auditor}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#viewDetail" id='detailSkor'
                                                data-id="{{$question->id_question}}"
                                                onClick="setIdQuestion('{{$question->id_question}}')">
                                                <i class="cil-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
        <!-- /.row-->
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
                            <th>Desc</th>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onClick="addScore()" class="btn btn-primary">Save changes</button>
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
        // var baseUrl="{{url('/')}}"+"/skor_audit"+"/{{$id_audit}}"+"/"+id_question;
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
@endsection
