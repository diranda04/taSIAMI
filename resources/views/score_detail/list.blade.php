@extends('layouts.app')

@section('content')

<div>
<div class="container">
            <div class="fade-in"  >
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
                    <div class="card-header"><i class="fa fa-align-justify"></i>Detail Skor</div>
                    <div class="card-body">
                    <!-- <a href="{{ url ('standards/create')}}" class="btn btn-success mb-2">Add Standard</a> -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDetail">
                    Add Detail
                    </button>
                      <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Skor</th>
                            <th>Desc</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($score_details as $score_detail)
                          <tr>
                            <td>{{$score_detail->score}}</td>
                            <td>{{$score_detail->desc}}</td>
                            <td>
                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editDetail" data-id_question="#"
                            data-desc="#">
                                <i class="cil-pencil"></i>
                            </a>

                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
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

<!-- add content -->
<div class="modal fade" id="addDetail" tabindex="-1" role="dialog" aria-labelledby="addDetailLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDetailLabel">Add Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">ID Question</label>
            <input type="text" name= "id_question" class="form-control" id="id_question" placeholder="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Deskribsi</label>
            <input type="int" name= "desc" class="form-control" id="desc" placeholder="">
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

<!-- Modal Edit Question -->
<div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Standard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Question</label>
        <input type="text" class="form-control-file" id="edit_id" name="id_question">
      </div>

      <div class="form-group">
        <label for="message-text" class="col-form-label">Keterangan</label>
        <textarea type="text" class="form-control-file" id="edit_desc" name="desc"></textarea>
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
      var id_question=$(this).data("id_question");
      var desc=$(this).data("desc");
      $("#edit_id").val(id_question);
      $("#edit_desc").val(desc);
      console.log(id_question);
    })

  })
</script>
@endsection
