@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <!-- /.col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Faculty</div>
                        <div class="card-body">
                            <!-- <a href="{{ url ('standards/create')}}" class="btn btn-success mb-2">Add Standard</a> -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addFaculty">
                                Add Faculty
                            </button>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Fakultas</th>
                                        <th>Nama Fakultas</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                    <tr>
                                        <th scope="row">{{$faculty->id_faculty }}</th>
                                        <td>{{$faculty->name}}</td>

                                        <td>
                                            <a href="{{ route('faculty.department',[$faculty->id_faculty]) }}"
                                                class="btn btn-success">
                                                Daftar Prodi
                                            </a>
                                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editFaculty" data-id_faculty="{{$faculty->id_faculty}}"
                                            data-name="{{$faculty->name}}">
                                                <i class="cil-pencil"></i>
                                            </a>
                                            <form action="{{ route('faculty.destroy',[$faculty->id_faculty]) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    <i class="cil-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $faculties->links() }}
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


</div>

<!-- Modal Add Standard -->
<div class="modal" id="addFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('faculty.post')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Fakultas</label>
        <input type="text" class="form-control-file" id="id_faculty" name="id_faculty">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Nama</label>
        <input type="text" class="form-control-file" id="name" name="name">
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

<!-- Modal Edit Standard -->

<div class="modal" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Faculties</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('faculty.edit')}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Fakultas</label>
        <input type="text" class="form-control-file" id="edit_id" name="id_faculty">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Nama Fakultas</label>
        <input type="text" class="form-control-file" id="edit_name" name="name">
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
      var id_faculty=$(this).data("id_faculty");
      var name=$(this).data("name");
      $("#edit_id").val(id_faculty);
      $("#edit_name").val(name);
      console.log(id_faculty);
    })

  })
</script>
@endsection
