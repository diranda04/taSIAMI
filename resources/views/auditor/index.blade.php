@extends('layouts.app')

@section('content')
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
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
                                            <input data-id="{{$auditor->id_auditor}}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $auditor->status ? 'checked' : '' }}>
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

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id_auditor = $(this).data('id_auditor');
         console.log("test");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/auditorChangeStatus',
            data: {'status': status, 'id_auditor': id_auditor},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

@endsection
