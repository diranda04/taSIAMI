@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

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
                        <div class="card-header"><i class="fa fa-align-justify"></i>Temuan Audit</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAuditFinding">
                        Tambah Temuan Audit
                        </button>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pernyataan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $no = 0;?>
                                @foreach ($audit_findings as $audit_finding)
                                <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$audit_finding->desc}}</td>
                                        <td>
                                            <form action="#" method="post" class="d-inline">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>
</div>

<div class="modal fade" id="addAuditFinding" tabindex="-1" role="dialog" aria-labelledby="addStandarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStandarLabel">Tambah Temuan Audit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('finding.post',[$id_audit])}}" method="POST">
        @csrf
        <div class="form-group" >
                  <label for="exampleFormControlFile1">ID Temuan Audit</label>
                  <input type="text" class="form-control-file" id="id_audit_finding" name="id_audit_finding">
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Keterangan</label>
                  <input type="text" class="form-control-file" id="desc" name="desc">
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

@endsection
