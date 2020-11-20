@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <div class="card-header"><i class="fa fa-align-justify"></i>Tambah User</div>
            <div class="card-body">
              <form action="{{route('user.post')}}" method="POST">
                @csrf
                <div class="form-group{{$errors->has('id') ? ' has-error' : ' '}}" >
                  <label for="exampleFormControlFile1">ID User</label>
                  <input type="text" class="form-control-file is-invalid" id="id" name="id" required autofocus >

                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Nama</label>
                  <input type="text" class="form-control-file" id="name" name="name" required>
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Username</label>
                  <input type="text" class="form-control-file" id="username" name="username" required>
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Email</label>
                  <input type="text" class="form-control-file" id="email" name="email" required>
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Password</label>
                  <input type="password" class="form-control-file" id="password" name="password" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Role</label>
                  <select name = "roleselect" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>

</div>
@endsection
</div>
</div>
</div>
</div>

@section('javascript')
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
