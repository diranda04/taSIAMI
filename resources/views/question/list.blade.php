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
                    <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
                    <div class="card-body">
                    <!-- <a href="{{ url ('standards/create')}}" class="btn btn-success mb-2">Add Standard</a> -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addQuestion">
                    Add Question
                    </button>
                      <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>ID Question</th>
                            <th>Question</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $question)
                          <tr>
                          <th scope="row">{{$question->id_question}}</th>
                            <td>{{$question->desc}}</td>
                            <td>
                            <a href="{{ route('score_detail.detail',[$question->id_question]) }}" class= "btn btn-success">
                                <i class="cil-input"></i>
                            </a>
                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editQuestion" data-id_question="{{$question->id_question}}"
                            data-desc="{{$question->desc}}">
                                <i class="cil-pencil"></i>
                            </a>
                            <form action="{{ route('question.destroy',[$question->id_question]) }}" method="post" class="d-inline">
                          @csrf
                          @method('DELETE')
                            <button class= "btn btn-danger">
                                <i class="cil-trash"></i>
                            </button>
                            </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
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
<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="addStandardLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStandardLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('question.post',[$id_standard_component])}}" method="POST">
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
      <form action="{{route('question.edit',[$id_standard_component])}}" method="POST">
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
