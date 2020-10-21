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
                    <!-- <a href="{{ url ('standars/create')}}" class="btn btn-success mb-2">Add Standar</a> -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStandarComponent">
                    Add standard_component
                    </button>
                      <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>

                            <th>ID Komponen Standar</th>
                            <th>Komponen Standar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($standard_components as $standard_component)
                          <tr>

                            <td>{{$standard_component->id_standard_component}}</td>
                            <td>{{$standard_component->desc}}</td>
                            <td>
                            <a href="{{ route('question.detail',[$standard_component->id_standard_component]) }}" class= "btn btn-success">
                                <i class="cil-description"></i>
                            </a>
                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editStandardComponent" data-id_standard_component="{{$standard_component->id_standard_component}}"
                                            data-desc="{{$standard_component->desc}}">
                                <i class="cil-pencil"></i>
                            </a>
                            <form action="{{ route('component.destroy',[$standard_component->id_standard_component]) }}" method="post" class="d-inline">
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
<div class="modal fade" id="addStandarComponent" tabindex="-1" role="dialog" aria-labelledby="addStandarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStandarLabel">Add Standard Component</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('component.post',[$id_standard])}}" method="POST">
        @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">ID Komponen Standar</label>
            <input type="text" name="id_standard_component" class="form-control" id="id_standard_component" placeholder="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Deskribsi</label>
            <input type="text" name="desc" class="form-control" id="desc" placeholder="">
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

<!--  -->

<!-- Modal Edit Standard -->
<div class="modal fade" id="editStandardComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Standard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('component.edit',[$id_standard])}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Standard Komponen</label>
        <input type="text" class="form-control-file" id="edit_id" name="id_standard_component">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Keterangan</label>
        <input type="text" class="form-control-file" id="edit_desc" name="desc">
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
      var id_standard_component=$(this).data("id_standard_component");
      var desc=$(this).data("desc");
      $("#edit_id").val(id_standard_component);
      $("#edit_desc").val(desc);
      console.log(id_standard_component);
    })

  })
</script>
@endsection