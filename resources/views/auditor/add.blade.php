@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Atur Auditor</div>
            <div class="card-body">
              <form action="{{route('auditor.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1">Nama</label>
                <select name = "auditorSelect" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Status</label>
                  <input type="text" class="form-control-file" id="status" name="status" value="1" required>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Tahun</label>
                  <input type="text" class="form-control-file" id="start_at" name="start_at" required>
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
