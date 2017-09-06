@extends('Admin::layouts.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Analytic</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="chart-area">
            <canvas id="mychart"></canvas>
        </div>
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
@stop
@section('script')
    <script src="{!!asset('/public/assets/backend/js/Chart.js') !!}"></script>
    <script>
        $(document).ready(function(){
            var ctx = document.getElementById('mychart');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data:{
                    labels: [
                         @foreach($data as  $value)
                            '{!! $value['date'] !!}',
                         @endforeach
                    ],
                    datasets:[
                        {
                            label: "Visitors",
                            borderColor: '#e84343',
                            data: [
                                @foreach($data as  $value)
                                   '{!! $value['visitors'] !!}',
                                @endforeach
                            ],
                            fill: false,
                        },
                        {
                            label: "Page Views",
                            borderColor: '#1515ed',
                            data: [
                                @foreach($data as  $value)
                                   '{!! $value['pageviews'] !!}',
                                @endforeach
                            ],
                            fill: false,
                        }
                    ]

                },
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    title:{
                        display:true,
                        text:'Report Pageviews & Visitors ',
                    },
                }
            });
        })
    </script>
@stop
