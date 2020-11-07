@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <!-- /.col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Instrumen AMI</div>
                        <div class="card-body">
                            <div id="reportPage">
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
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Hasil Penilaian</div>
                        <div class="card-body">
                            <div id="reportPage">
                    <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Indikator Penilaian</th>
                                            <th>Score Audit</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach ($questions as $question)
                                    <?php $no++ ;?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$question->desc}}</td>
                                        <td>{{$question->score_auditor}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $questions->links() }}
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
    @section('javascript')

    <script src="{{ asset('js\Chart.min.js')}}"></script>
    <script src="{{ asset('css\coreui-chartjs.css')}}"></script>
    <script src="{{ asset('js\charts.js')}}"></script>
    <script src="{{ asset('js\coreui-chartjs.bundle.js')}}"></script>

    <script>
        var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: {!! json_encode($standards_title) !!},
        datasets: [{
            label: '# of Votes',
            data: {!! json_encode($graph_avg) !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        title: {
            display: true,
            fontSize: 20,
            text: 'PETA MUTU'
        }
    }
});

    </script>

    @endsection
