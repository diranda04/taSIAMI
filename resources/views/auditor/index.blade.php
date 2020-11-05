@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Manajemen Auditor</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('auditor.add')}}">
                            Tambahkan Auditor
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($auditors as $auditor)
                                    <tr>
                                        <td>{{$auditor->user->name}}</td>
                                        <td>
                                        @if($auditor->status == 1)
                                        <a href="{{ route('auditor.change',[$auditor->id_auditor]) }}" class="btn btn-success">Aktif</a>
                                        @else
                                        <a href="{{ route('auditor.change',[$auditor->id_auditor]) }}" class="btn btn-danger">Tidak Aktif</a>
                                        @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('auditor.destroy',[$auditor->id_auditor]) }}" method="post" class="d-inline">
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
