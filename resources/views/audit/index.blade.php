@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Periode Audit Program Studi</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('audit.add')}}">
                            Tambahkan Periode Audit Prodi
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($audits as $audit)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($audit->periode->audit_start_at)->format('Y')}}</td>
                                        <td>{{$audit->department->department_name}}</td>
                                        <td>
                                            <form action="{{ route('audit.destroy',[$audit->id_audit]) }}" onclick="return confirm('Anda yakin menghapus data ?')" method="post" class="d-inline">
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
