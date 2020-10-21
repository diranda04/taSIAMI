@extends('layouts.app')

@section('content')

<div>
<div class="container">
            <div class="fade-in"  >
            <div class="row">
                <!-- /.col-->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Komponen Standar</div>
                    <div class="card-body">
                    <!-- <a href="{{ url ('standars/create')}}" class="btn btn-success mb-2">Add Standar</a> -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStandar">
                    Add Komponen
                    </button>
                      <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            
                            <th>ID_Komponen</th>
                            <th>Komponen Standar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($komponens as $komponen)
                          <tr>

                            <td>{{$komponen->id_komponen}}</td>
                            <td>{{$komponen->keterangan}}</td>
                            <td>
                            <a href="#" class= "btn btn-success">
                                <i class="cil-description"></i>
                            </a>
                            <a href="#" class= "btn btn-primary">
                                <i class="cil-pencil"></i>
                            </a>
                            <a href="#" class= "btn btn-danger">
                                <i class="cil-trash"></i>
                            </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
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
          @endsection
</div>
<div class="modal fade" id="addStandar" tabindex="-1" role="dialog" aria-labelledby="addStandarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStandarLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ action ('StandarController@store') }}" method="POST">
        @csrf
          <div class="form-group">
            <label for="formGroupExampleInput">Standar</label>
            <input type="text" class="form-control" id="nama" placeholder="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Status</label>
            <input type="int" class="form-control" id="status" placeholder="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@section('javascript')

@endsection