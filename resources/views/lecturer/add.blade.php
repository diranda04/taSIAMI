@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Lengkapi Data Dosen</div>
            <div class="card-body">
              <form action="{{route('lecturer.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1">Nama</label>
                <select name = "lecturerSelect" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Alamat</label>
                  <input type="text" class="form-control-file" id="address" name="address">
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">No Telpon</label>
                  <input type="text" class="form-control-file" id="telephone" name="telephone">
              </div>
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
