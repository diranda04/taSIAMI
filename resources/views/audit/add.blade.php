@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Periode Audit Prodi</div>
            <div class="card-body">
              <form action="{{route('audit.post')}}" method="POST">
              @csrf
              <div class="form-group" >
                  <label for="exampleFormControlFile1">ID Audit</label>
                  <input type="text" class="form-control-file" id="id_audit" name="id_audit">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect3">Periode</label>
                <select name = "periodeSelect" class="form-control" id="exampleFormControlSelect3">
                    @foreach ($periodes as $periode)
                    <option value="{{$periode->id_periode}}">{{Carbon\Carbon::parse($periode->audit_start_at)->format('Y')}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Prodi</label>
                <select name = "prodiSelect" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($departments as $department)
                    <option value="{{$department->id_department}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
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
