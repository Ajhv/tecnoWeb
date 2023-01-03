@extends('layouts.app')

@section('content')
<div>
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Limpieza del terreno', 'Cimentacion', 'Drenaje', 'Estructura', 'Servicios', 'Acabado'],
        datasets: [{
          label: 'Tareas Asignadas (dias)',
          data: [3, 10, 15, 20, 23, 30],
          borderColor: 'rgb(236, 115, 80)',
        },
        {
          label: 'Tareas Ejecutadas (dias)',
          data: [3, 13, 18, 26, 29, 38],
          borderColor: 'rgb(80, 236, 219)',
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection