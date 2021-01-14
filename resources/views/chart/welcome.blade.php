<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div align="center">
                <div id="draw-charts"></div>
                </div>

                <form action="/print_chart" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="chartData" id="chartInputData">
                    <input type="submit" value="Print Chart">
                </form>

            <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    $(function(){
                            let weekOne = [
                                            ['Week', 1],
                                            ['Sunday', 800],
                                            ['Monday', 500],
                                            ['Tuesday', 690],
                                            ['Wednesday', 467],
                                            ['Friday', 890]
                                            ];
                            let weeksData = [weekOne];

                            for(let r =0; r<weeksData.length; r++){
                                //APPENDING DIVS SO WE CAN HAVE CHART ON EACH DIV
                                $("#draw-charts").append("<div id='draw-charts"+r+"'></div>");
                                    google.charts.load('current',{
                                            callback: function(){
                                                var data = new google.visualization.DataTable();
                                                //ADDING COLUMN WITH DEFINING TYPE OF CONTENT
                                                data.addColumn('string','Days');
                                                data.addColumn('number','Income');
                                                //ADDING DATA TO GOOGLE CHART
                                                data.addRows(weeksData[r]);
                                                //SETTING TITLE WIDTH AND HEIGHT OF CHARTS
                                                var options = {
                                                    title:"Printing Charts In Loop",
                                                    width:300,
                                                    height:200
                                                    };
                                            let chart_div = document.getElementById("draw-charts"+r);
                                            let chart = new google.visualization.PieChart(chart_div);
                                        google.visualization.events.addListener(chart,'ready',function(){
                                            chart_div.innerHTML = '<img src="'+chart.getImageURI() +'">';
                                        });

                                        chart.draw(data,options);
                                        },
                                        packages: ['corechart']
                                    })
                            }

                            //Setting chart data to Input
                            setTimeout(function(){
                                let chartsData = $("#draw-charts").html();
                                $("#chartInputData").val(chartsData);
                            },1000);
                });
                </script>

            </div>
        </div>
    </body>
</html>
