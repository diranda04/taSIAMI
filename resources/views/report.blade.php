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
    <br>
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Standar</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($standards as $standard)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $standard["standard_component"] }}</td>
                <td>{{ $standard["rata_rata"] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    </body>
</html>



@section('javascript')

@endsection

