@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <!-- /.col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Program Studi</div>
                        <div class="card-body">
                            <!-- <a href="{{ url ('standards/create')}}" class="btn btn-success mb-2">Add Standard</a> -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDepartment">
                                Tambah Program Studi
                            </button>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td>{{$department->department_name}}</td>

                                        <td>
                                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editDepartment" data-id_department="{{$department->id_department}}"
                                            data-department_name="{{$department->department_name}}">
                                                <i class="cil-pencil"></i>
                                            </a>
                                            <form action="{{ route('department.destroy',[$department->id_department]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')" class="d-inline">
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
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Prgoram Studi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('prodi.post',[$id_faculty])}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlFile1">Nama</label>
        <input type="text" class="form-control-file" id="department_name" name="department_name" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Akreditasi</label>
        <input type="text" class="form-control-file" id="accreditation" name="accreditation" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">No.SK/Link</label>
        <input type="text" class="form-control-file" id="sk_num" name="sk_num">
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

<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('prodi.edit',[$id_faculty])}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Prodi</label>
        <input type="text" class="form-control-file" id="edit_id" name="id_department">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Nama Prodi</label>
        <input type="text" class="form-control-file" id="edit_name" name="department_name">
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
      var id_department=$(this).data("id_department");
      var department_name=$(this).data("department_name");
      $("#edit_id").val(id_department);
      $("#edit_name").val(department_name);
      console.log(id_department);
    })

  })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })
</script>
@endsection
