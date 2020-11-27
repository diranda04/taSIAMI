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
                        <br>
                        <h5 class="text-center">PETA MUTU</h5>
                        <br>
                        <div clas="card-body">
                            <canvas id="marksChart" width="200" height="100"></canvas>
                        </div>
                        <br>
                    </div>
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Hasil Penilaian</div>
                        <div class="card-body">
                            <div id="reportPage">
                            <table class="table table-responsive-sm table-striped">
                                @foreach ($standardAudits as $standardAudit)
                                <tr>
                                    <th colspan="5">{{$standardAudit->name}}</th>
                                </tr>
                                @foreach ($standardAudit->standardComponent as $sc)
                                <tr>
                                    <th colspan="5">{{$sc->desc}}</th>
                                </tr>
                                    <tr class="text-center">
                                        <th class="align-middle border-right">No</th>
                                        <th class="align-middle border-right">Indikator Penilaian</th>
                                        <th class="align-middle border-right">Skor Audit</th>
                                    </tr>
                                <tbody>
                                    @foreach ($sc->question as $q)
                                    <tr>
                                        <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                        <td class="border-right">{{$q->desc}}</td>
                                        <td class="text-center border-right">{{$q->nilaiFromAudit($id_audit)->first() ? $q->nilaiFromAudit($id_audit)->first()->score_auditor : ""}}</td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $standardAudits->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
    @section('javascript')

    <script src="https://fonts.googleapis.com/css?family=Lato"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
        var marksCanvas = document.getElementById("marksChart");
        var marksData = {
            labels: {!!json_encode($standards_title) !!},
            datasets: [{
                label: "Peta Mutu",
                backgroundColor: "rgba(0,255,0,0.2)",
                radius: 6,
                pointRadius: 6,
                pointBorderWidth: 3,
                pointBackgroundColor: "green",
                pointBorderColor: "rgba(0,200,0,0.6)",
                pointHoverRadius: 10,
                borderColor: "rgba(0,260,0,0.6)",
                data: {!!json_encode($graph_avg) !!}
            }]
        };

        var chartOptions = {
            scale: {
                ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 4,
                    stepSize: 0.5
                },
                pointLabels: {
                    fontSize: 12
                }
            },
            legend: {
                position: 'left'
            }
        };

        var radarChart = new Chart(marksCanvas, {
            type: 'radar',
            data: marksData,
            options: chartOptions
        });

    </script>

    @endsection
