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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStandard">
                                Add Standards
                            </button>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Standar</th>
                                        <th>Standar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($standards as $standard)
                                    <tr>
                                        <th scope="row">{{$standard->id_standard }}</th>
                                        <td>{{$standard->name}}</td>
                                        <td>
                                            <a href="{{ route('standard.detail',[$standard->id_standard]) }}"
                                                class="btn btn-success">
                                                <i class="cil-description"></i>
                                            </a>
                                            <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editStandard" data-id_standard="{{$standard->id_standard}}"
                                            data-name="{{$standard->name}}"> 
                                                <i class="cil-pencil"></i>
                                            </a>
                                            <form action="{{ route('standard.destroy',[$standard->id_standard]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')"
                                            class="d-inline">
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
                            {{ $standards->links() }}
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
<div class="modal fade" id="addStandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Standard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('standard.post')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Standard</label>
        <input type="text" class="form-control-file" id="id_standard" name="id_standard">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Keterangan</label>
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

<div class="modal fade" id="editStandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Standard</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('standard.edit')}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID Standard</label>
        <input type="text" class="form-control-file" id="edit_id" name="id_standard">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Keterangan</label>
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
      var id_standard=$(this).data("id_standard");
      var name=$(this).data("name");
      $("#edit_id").val(id_standard);
      $("#edit_name").val(name);
      console.log(id_standard);
    })

  })
</script>


@endsection
