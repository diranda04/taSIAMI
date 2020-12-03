@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR AUDITEE</div></h5>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="align-middle border-right">Nama</th>
                                        <th class="align-middle border-right">Program Studi</th>
                                        <th class="align-middle border-right">Mulai Menjabat</th>
                                        <th class="align-middle border-right">Akhir Menjabat</th>
                                        <th class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($auditees as $auditee)
                                    <tr>
                                        <td class="border-right">{{$auditee->user->name}}</td>
                                        <td class="border-right">{{$auditee->department->department_name}}</td>
                                        <td class="border-right">{{$auditee->start_at}}</td>
                                        <td class="border-right">{{$auditee->end_at}}</td>
                                        <td>
                                            <form action="{{ route('auditee.destroy',[$auditee->id_auditee]) }}"
                                                method="post" onclick="return confirm('Anda yakin menghapus data ?')"
                                                class="d-inline">
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
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Auditee</div></h5>
                        <div class="card-body">
                            <form action="{{route('auditee.post')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama</label>
                                    <select name="userSelect" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled value=""></option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Jurusan</label>
                                    <select name="departmentSelect" class="form-control" id="exampleFormControlSelect2">
                                    <option selected disabled value=""></option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id_department}}">{{$department->department_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Awal Menjabat</label>
                                    <input type="text" class="form-control-file" id="start_at" name="start_at" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Akhir Menjabat</label>
                                    <input type="text" class="form-control-file" id="end_at" name="end_at" required>
                                </div>
                                <button type="submit" class="btn btn-primary"><span
                                        class="cil-save btn-icon mr-2"></span>Simpan</button>
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
    $(document).ready(function () {
        var flash = "{{ Session::has('sukses') }}";
        if (flash) {
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })

</script>
@endsection
