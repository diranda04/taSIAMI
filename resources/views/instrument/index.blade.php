@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i><strong>DAFTAR ISI : </strong>{{$book->book_name}}</div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addStandard">
                        <span class="cil-plus btn-icon mr-2"></span>Tambah isi
                            </button>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right">No</th>
                                        <th class="border-right">Nama Standar</th>
                                        <th class="border-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($instruments as $instrument)
                                    <tr>
                                        <td class="border-right">{{$loop->iteration}}.</td>
                                        <td class="border-right">{{$instrument->standard->name}}</td>
                                        <td>
                                            <form action="{{ route ('instrument.destroy',[$instrument->id])}}" method="post" onclick="return confirm('Anda yakin menghapus data ?')" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-youtube">
                                                    <span class="cil-trash btn-icon mr-2"></span>Hapus
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
<!-- Modal Add Standard -->
<div class="modal fade" id="addStandard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Daftar Isi Instrumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('instrumentStandard.post',[$id_book])}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect2">Standar Audit</label>
                <select name = "standardSelect" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($standards as $standard)
                    <option value="{{$standard->id_standard}}">{{$standard->name}}</option>
                    @endforeach
                </select>
              </div>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
                </div>
              </form>
    </div>
  </div>
</div>

@section('javascript')

@endsection
