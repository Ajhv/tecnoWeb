@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="section-header">
            <h3 class="page__heading">Estadistica de Asignacion de activos</h3>
        </div>

        <div class="row">
            <div class="col">
            <div id="container"></div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
         var asignacion = <?php echo json_encode($asignacion)?>;

        Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Reporte de asignacion'
        },
        subtitle: {
            text: 'Canal 11 TVU '
        },
        /*accessibility: {
            announceNewData: {
                enabled: false
            }
        },*/
        xAxis: {
            categories : ['Oficina', 'Sala', 'Ambiente']
        },
        yAxis: {
            title: {
                text: 'Total de asignaciones'
            }
        },
        legend: {
            layout : 'vertical',
            align : 'right',
            verticalAlign : 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total<br/>'
        },

        series: [
            {
                name: "asignacion",
                colorByPoint: true,
                data: asignacion
            }
        ],

    });
    </script>
@endsection