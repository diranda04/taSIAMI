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
                <option selected disabled value=""></option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Alamat</label>
                  <textarea type="text" class="form-control-file" id="address" name="address" required cols="30" rows="3"></textarea>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">No Telpon</label>
                  <input type="text" class="form-control-file" id="telephone" name="telephone" required>
              </div>
                  <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
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
