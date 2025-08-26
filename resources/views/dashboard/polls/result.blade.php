@extends('dashboard.layout')

@section('content')
    <h2>{{$poll->title}} - Poll Results</h2>
    <p>Results will be displayed here.</p>
    <div class="card">
        <div class="mx-auto">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    const labels = @json($labels);
    const data = @json($data);

    new Chart(ctx, {
        type: 'bar',  // 'bar', 'pie', 'line' etc.
        data: {
            labels: labels,
            datasets: [{
                label: 'Votes',
                data: data,
                borderWidth: 1,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                ],
                borderColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)',
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: '{{ $poll->title }}' }
            }
        }
    });
</script>
@endsection