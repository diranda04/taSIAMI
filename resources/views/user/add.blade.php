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
                <div class="form-group">
                  <label for="exampleFormControlFile1">ID User</label>
                  <input type="text" class="form-control-file" id="id" name="id">
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Nama</label>
                  <input type="text" class="form-control-file" id="name" name="name" >
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Username</label>
                  <input type="text" class="form-control-file" id="username" name="username">
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Email</label>
                  <input type="text" class="form-control-file" id="email" name="email">
                </div>
                <div class="form-group" >
                  <label for="exampleFormControlFile1">Password</label>
                  <input type="password" class="form-control-file" id="password" name="password">
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

@endsection
