@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR AUDITOR</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right">No</th>
                                        <th class="border-right">Nama</th>
                                        <th class="border-right">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($auditors as $auditor)
                                    <tr>
                                        <td class="border-right">{{$loop->iteration}}.</td>
                                        <td class="border-right">{{$auditor->user->name}}</td>
                                        <td class="border-right">
                                        @if($auditor->status == 1)
                                        <a href="{{ route('auditor.change',[$auditor->id_auditor]) }}" class="btn btn-success"><span class="cil-check-circle btn-icon mr-2"></span>Aktif</a>
                                        @else
                                        <a href="{{ route('auditor.change',[$auditor->id_auditor]) }}" class="btn btn-youtube"><span class="cil-x-circle btn-icon mr-2"></span>Tidak Aktif</a>
                                        @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('auditor.destroy',[$auditor->id_auditor]) }}"  onclick="return confirm('Anda yakin menghapus data ?')" method="post" class="d-inline">
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
                <div class="col-sm-4">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Auditor</div></h5>
                        <div class="card-body">
                        <form action="{{route('auditor.post')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1">Nama</label>
                <select name = "auditorSelect" class="form-control" id="exampleFormControlSelect1">
                <option selected disabled value=""></option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
              </div>
                  <input type="hidden" class="form-control-file" id="status" name="status" value="1" required>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Tahun</label>
                  <input type="text" class="form-control-file" id="start_at" name="start_at" required>
              </div>
              <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
                </div>
              </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
