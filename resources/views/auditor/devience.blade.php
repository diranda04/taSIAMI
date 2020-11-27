@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Permintaan Tindakan Koreksi</div></h5>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addDevience">
                        <span class="cil-plus btn-icon mr-2"></span>Tambah Keadaan Menyimpang
                        </button>
                        <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border-right">No</th>
                                        <th class="border-right">Keadaan Menyimpang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($correction_forms as $correction_form)
                                    <tr class="text-center">
                                        <td class="border-right">{{$loop->iteration}}.</td>
                                        <td class="border-right">{{$correction_form->devience}}</td>
                                        <td>
                                        <form action="{{ route('devience.destroy',[$correction_form->id_correction_form]) }}"  onclick="return confirm('Anda yakin menghapus data ?')" method="post" class="d-inline">
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
                  <label for="exampleFormControlFile1">Keadaan Menyimpang</label>
                  <textarea type="text" class="form-control-file" id="devience" name="devience" cols="30" rows="5"></textarea>
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
