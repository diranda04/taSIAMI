@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>PERIODE AUDIT PROGRAM STUDI</div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th class="border-right">Periode</th>
                                    <th class="border-right">Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audits as $audit)
                                <tr class="text-center">
                                    <td class="border-right">
                                        {{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                    <td class="border-right">{{$audit->department->department_name}}</td>
                                    <td>
                                        <form action="{{ route('audit.destroy',[$audit->id_audit]) }}"
                                            onclick="return confirm('Anda yakin menghapus data ?')" method="post"
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
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Periode Audit Program Studi
                        </div>
                    </h5>
                    <div class="card-body">
                        <form action="{{route('audit.post')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Periode</label>
                                <select name="periodeSelect" class="form-control" id="exampleFormControlSelect3">
                                    <option selected disabled value=""></option>
                                    @foreach ($periodes as $periode)
                                    <option value="{{$periode->id_periode}}">
                                        {{Carbon\Carbon::parse($periode->audit_start_at)->format('Y')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Prodi</label>
                                <select name="prodiSelect" class="form-control" id="exampleFormControlSelect2">
                                    <option selected disabled value=""></option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id_department}}">{{$department->department_name}}
                                    </option>
                                    @endforeach
                                </select>
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
