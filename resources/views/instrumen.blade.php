<html>
<head>
    <title> Instrumen AMI </title>
    <style>
        table,
        th,
        td {
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
        @foreach ($standards as $standard)
        <tr>
            <th colspan="5">{{$standard->name}}</th>
        </tr>
        @foreach ($standard->standardComponent as $sc)
        <tr>
            <th colspan="5">{{$sc->desc}}</th>
        </tr>
        <tr class="text-center">
            <th class="align-middle border-right">No</th>
            <th class="align-middle border-right">Indikator Penilaian</th>
            <th class="align-middle border-right">Skor Taksiran</th>
            <th class="align-middle border-right">Skor Audit</th>
        </tr>
        <tbody>
            @foreach ($sc->question as $q)
            <tr>
                <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                <td class="border-right">{{$q->desc}}</td>
                <td class="text-center border-right"></td>
                <td class="text-center border-right"></td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
        </tbody>
    </table>
    <br>

</body>

</html>

@section('javascript')

@endsection
