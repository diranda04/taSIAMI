@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Daftar User</div>
                        <div class="card-body">
                        <a class="btn btn-primary" role="button" href="{{route('user.add')}}">
                                Add User
                        </a>
                        <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                    <tr>
                                        <th scope="row">{{$users->firstItem()+$no }}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>
                                        <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editUser"
                                        data-id="{{$user->id}}" data-name="{{$user->name}}" data-username="{{$user->username}}"
                                        data-email="{{$user->email}}" data-role_id="{{$user->roleselect}}" >
                                            <i class="cil-pencil"></i>
                                        </a>
                                        <form action="{{ route('user.destroy',[$user->id]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')"
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
                            {{ $users->links() }}
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
</div>


<!-- Modal Edit User -->

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('user.edit')}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="exampleFormControlFile1">ID User</label>
        <input type="text" class="form-control-file" id="edit_id" name="id">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Name</label>
        <input type="text" class="form-control-file" id="edit_name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Username</label>
        <input type="text" class="form-control-file" id="edit_username" name="username">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Email</label>
        <input type="text" class="form-control-file" id="edit_email" name="email">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Role</label>
        <select name = "roleselect" class="form-control" id="edit_role">
        @foreach ($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        </select>
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
      var id=$(this).data("id");
      var name=$(this).data("name");
      var username=$(this).data("username");
      var email=$(this).data("email");
      var roleselect=$(this).data("roleselect");
      $("#edit_id").val(id);
      $("#edit_name").val(name);
      $("#edit_username").val(username);
      $("#edit_email").val(email);
      $("#edit_role").val(roleselect);
      console.log(id);
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

