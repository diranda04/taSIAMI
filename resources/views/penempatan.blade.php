<html>
<head>
    <title> Instrumen AMI </title>
    <style>
        table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        height: 30px;
        }
        table {
        width: 100%;
        }
    </style>
</head>

<body bgcolor="white">
<img style="width:100%" src="{{ ('assets/img/pengumuman.jpg') }}">
    <br>
    <br>
    <p align="center"><strong>DAFTAR PENEMPATAN AUDITOR</strong></p>
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th style="width:5%">No</th>
                <th style="width:45%">Auditor</th>
                <th style="width:50%">Prodi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($auditors as $auditor)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $auditor->name }}</td>
                <th>{{ $auditor->department_name }}</th>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <p align="center"><strong>DAFTAR KETUA JURUSAN/KETUA PROGRAM STUDI/AUDITEE</strong></p>
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th style="width:5%">No</th>
                <th style="width:45%">Auditee</th>
                <th style="width:50%">Prodi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($auditees as $auditee)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $auditee->name }}</td>
                <th>{{ $auditee->department_name }}</th>

            </tr>
            @endforeach
        </tbody>
    </table>


    </body>
</html>

@section('javascript')

@endsection

