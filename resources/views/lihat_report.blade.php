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

                    <div id="chartT"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@section('javascript')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('chartT', {

chart: {
    polar: true
},

accessibility: {
    description: '.'
},

title: {
    text: 'Peta Mutu',
    x: -80
},

pane: {
    size: '80%'
},

xAxis: {
    categories: {!! json_encode($standards_title) !!},
    tickmarkPlacement: 'on',
    lineWidth: 0
},

yAxis: {
    gridLineInterpolation: 'polygon',
    lineWidth: 0,
    min: 0
},

tooltip: {
    shared: true,
},

legend: {
    align: 'right',
    verticalAlign: 'middle',
    layout: 'vertical'
},

series: [{
    name: 'Skor Audit',
    type: 'area',
    data: {!! json_encode($graph_avg) !!},
    pointPlacement: 'on'
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal'
            },
            pane: {
                size: '70%'
            }
        }
    }]
}

});

</script>
@endsection
