@extends('layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Hasil Survey</h2>

<p><strong>Dominant Style:</strong> {{ $survey->dominant_style }}</p>

<div class="my-4">
    <canvas id="leadershipChart"></canvas>
</div>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th class="border px-4 py-2">Leadership Style</th>
            <th class="border px-4 py-2">Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stylesCount as $style => $count)
            <tr>
                <td class="border px-4 py-2">{{ $style }}</td>
                <td class="border px-4 py-2">{{ $count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('leadershipChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($stylesCount)) !!},
            datasets: [{
                label: 'Score',
                data: {!! json_encode(array_values($stylesCount)) !!},
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2,
                fill: false,
                tension: 0.3, // sedikit lengkung, atau 0 jika ingin garis lurus
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    title: {
                        display: true,
                        text: 'Score'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Leadership Style'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Score  Leadership Style'
                }
            }
        }
    });
</script>
@endpush
