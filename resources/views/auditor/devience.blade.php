@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Permintaan Tindakan Koreksi</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDevience">
                        Tambah Keadaan Menyimpang
                        </button>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keadaan Menyimpang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $no = 0;?>
                                @foreach ($correction_forms as $correction_form)
                                <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$correction_form->devience}}</td>
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

<div class="modal fade" id="addDevience" tabindex="-1" role="dialog" aria-labelledby="addStandarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStandarLabel">Tambah Keadaan Menyimpang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('devience.post',[$id_audit])}}" method="POST">
        @csrf
        <div class="form-group" >
                  <label for="exampleFormControlFile1">ID PTK</label>
                  <input type="text" class="form-control-file" id="id_correction_form" name="id_correction_form">
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Keadaan Menyimpang</label>
                  <input type="text" class="form-control-file" id="devience" name="devience">
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
