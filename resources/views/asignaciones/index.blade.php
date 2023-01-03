@extends('layouts.app')

@section('content')
<div>
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: 'Tareas Asignaddas (dias)',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 3
        },
        {
          label: 'Tareas Ejecutadas (dias)',
          data: [1, 9, 13, 9, 4, 3],
          borderWidth: 3
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