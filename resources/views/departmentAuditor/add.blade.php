@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Auditor Prodi</div>
            <div class="card-body">
              <form action="{{route('departmentAudit.post')}}" method="POST">
              @csrf
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Kode Auditor Prodi</label>
                  <input type="text" class="form-control-file" id="id_department_audit" name="id_department_audit">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect3">Auditor</label>
                <select name = "auditorSelect" class="form-control" id="exampleFormControlSelect3">
                    @foreach ($auditors as $auditor)
                    <option value="{{$auditor->id_auditor}}">{{$auditor->user ->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Audit</label>
                <select name = "auditSelect" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($audits as $audit)
                    <option value="{{$audit->id_audit}}">{{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y') }} {{$audit->department->name}}</option>
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
