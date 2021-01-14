@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>VERSI INSTRUMEN AMI</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right">No</th>
                                        <th class="border-right">Versi Instrumen AMI</th>
                                        <th class="border-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($instruments as $instrument)
                                    <tr>
                                        <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                        <td class="border-right">{{$instrument->instrument_name}}</td>
                                        <td>
                                        <a href="{{ route('instrument.detail',[$instrument->id_instrument]) }}"
                                                class="btn btn-success"><span class="cil-education btn-icon mr-2"></span>Daftar Isi</a>
                                        </a>
                                        <a href="" class="btn btn-behance" id="editButton" data-toggle="modal"
                                            data-target="#editInstrument"
                                            data-id_instrument="{{$instrument->id_instrument}}"
                                            data-instrument_name="{{$instrument->instrument_name}}">
                                            <span class="cil-pencil btn-icon mr-2"></span>Edit
                                        </a>
                                        <form action="{{ route('instrument.destroy',[$instrument->id_instrument]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')" class="d-inline">
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

<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Versi Instrumen AMI</div></h5>
            <div class="card-body">
              <form action="{{route('instrument.post')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlFile1">Tambahkan Versi AMI</label>
                  <input type="text" class="form-control-file" id="instrument_name" name="instrument_name" placeholder="  judul instrumen . . " required>
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

<div class="modal fade" id="editInstrument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Nama Versi Instrumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('instrument.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id" name="id_instrument">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Keterangan</label>
                        <input type="text" class="form-control-file" id="edit_name" name="instrument_name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"><span
                        class="cil-save btn-icon mr-2"></span>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@section('javascript')
<script>
    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id_instrument = $(this).data("id_instrument");
            var instrument_name = $(this).data("instrument_name");
            $("#edit_id").val(id_instrument);
            $("#edit_name").val(instrument_name);
            console.log(id_instrument);
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })
</script>
@endsection
