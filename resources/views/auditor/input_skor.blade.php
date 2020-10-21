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
                  <th>Score Taksiran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0;?>
              @foreach ($audit_scores as $audit_score)
              <?php $no++ ;?>
                <tr>
                <th scope="row">{{$no}}</th>
                  <td>{{$audit_score->question->desc}}</td>
                  <td>{{$audit_score->score_auditee}}</td>
                  <td>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewDetail">
                      <i class="cil-input"></i>
                  </button>
                  <button href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#addScore">
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
<div class="modal fade" id="addScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Standard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('skorAuditor.add',[$id_audit])}}" method="POST">
      @csrf
      @method('PATCH')
      <h6>Isi Skor 0-4</h6>
          <div class="form-group">
            <label for="formGroupExampleInput2">Tambah Skor</label>
            <input type="text" class="form-control-file" id="edit_score_auditor"" name="score_auditor">
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
  $(document).ready(function(){

    $(document).on("click","#editButton", function(){
      var score_auditor=$(this).data("score_auditor");
      $("#edit_score_auditor").val(score_auditor);
      console.log(id_audit_score);
    })

  })
</script>
@endsection
