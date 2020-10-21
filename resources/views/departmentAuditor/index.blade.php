@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
                        <div class="card-body">
                        <a class="btn btn-success" role="button" href="{{route('departmentAudit.add')}}">
                            Tambahkan Auditor Prodi
                        </a>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Auditor</th>
                                        <th>Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($department_audits as $department_audit)
                                    <tr>
                                        <td>{{$department_audit->auditor->user->name}}</td>
                                        <td>{{$department_audit->audit->department->name}}</td>
                                        <td>
                                            <form action="{{ route('departmentAudit.destroy',[$department_audit->id_department_audit]) }}" method="post" class="d-inline">
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

@endsection
