@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <!-- /.col-->
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
                        <div class="card-header"><i class="fa fa-align-justify"></i>Periode AMI</div>
                        <div class="card-body">
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPeriode">
                                Add Periode
                            </button> -->
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Periode</th>
                                        <th>Mulai Audit</th>
                                        <th>Akhir Audit</th>
                                        <th>Mulai Submit</th>
                                        <th>Akhir Submit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodes as $periode)
                                    <tr>
                                        <th scope="row">{{$periode->id_periode}}</th>
                                        <td>{{$periode->audit_start_at}}</td>
                                        <td>{{$periode->audit_end_at}}</td>
                                        <td>{{$periode->submit_start_at}}</td>
                                        <td>{{$periode->submit_end_at}}</td>
                                        <td>
                                        <form action="{{ route('periode.destroy',[$periode->id_periode]) }}" method="post" class="d-inline">
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
                            {{ $periodes->links() }}
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

<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Periode AMI</div>
            <div class="card-body">
              <form action="{{route('periode.post')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlFile1">ID Periode</label>
                  <input type="text" class="form-control-file" id="id_periode" name="id_periode">
                </div>
                <div class="form-group" id='datepicker' >
                  <label for="exampleFormControlFile1">Mulai Audit</label>
                  <input type="text" class="datepicker-here form-control" data-language='en'  id="audit_start_at" name="audit_start_at" >
                </div>
                <div class="form-group" id='datepicker'>
                  <label for="exampleFormControlFile1">Akhir Audit</label>
                  <input type="text" class="datepicker-here form-control" id="audit_end_at" name="audit_end_at">
                </div>
                <div class="form-group" id='datepicker'>
                  <label for="exampleFormControlFile1">Mulai Submit</label>
                  <input type="text" class="datepicker-here form-control" id="submit_start_at" name="submit_start_at">
                </div>
                <div class="form-group" id='datepicker'>
                  <label for="exampleFormControlFile1">Akhir Submit</label>
                  <input type="text" class="datepicker-here form-control" id="submit_end_at" name="submit_end_at">
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

@section('javascript')
<script>
  $('.datepicker').datepicker({
  language: 'en',
  format: 'dd mmmm yyyy',
  autoclose: true,
  });
</script>
@endsection
