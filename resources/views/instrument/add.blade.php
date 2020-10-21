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
              <form action="{{route('periodeStandard.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect2">Standard</label>
                <select name = "standardSelect" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($standards as $standard)
                    <option value="{{$standard->id_standard}}">{{$standard->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect3">Periode</label>
                <select name = "periodeSelect" class="form-control" id="exampleFormControlSelect3">
                    @foreach ($periodes as $periode)
                    <option value="{{$periode->id_periode}}">{{Carbon\Carbon::parse($periode->audit_start_at)->format('Y')}}</option>
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
