@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in"  >
  <div class="row">
      <!-- /.col-->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
            <thead>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Indikator Penilaian</th>
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
                  <td>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewDetail">
                      <i class="cil-input"></i>
                  </button>
                  <button type="button" class="btn btn-primary" onClick="addScore('{{$question->id_question}}')">
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
<div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <tbody>
      @foreach ($score_details as $score_detail)
        <tr>
          <td>{{$score_detail->score}}</td>
          <td>{{$score_detail->desc}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- add score -->
<div class="modal fade" id="addScore" tabindex="-1" role="dialog" aria-labelledby="addDetailLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDetailLabel">Tambah Taksiran Skor Audit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="auditeeScore" method="POST">
        @csrf
        <h6>Isi Skor 0-4</h6>
          <div class="form-group">
            <label for="formGroupExampleInput2">Tambah Skor</label>
            <input type="int" name="score_auditee" class="form-control" id="score_auditee" placeholder="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('javascript')
<script>
function addScore(id_question) { 
  $('#addScore').modal('show');
  var baseUrl="{{url('/')}}"+"/skor_taksiran"+"/{{$id_audit}}"+"/"+id_question;
  $('#auditeeScore').attr('action', baseUrl);
}
</script>
@endsection
