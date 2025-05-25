@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <div class="bg-white shadow-md rounded-lg p-6 border border-blue-200">
            <h2 class="text-2xl font-semibold text-blue-700 mb-4">Hasil Survey</h2>

            <p class="text-lg mb-6">
                <span class="text-gray-600 font-medium">Dominant Style:</span>
                <span class="text-blue-600 font-semibold">{{ $survey->dominant_style }}</span>
            </p>

            <div class="bg-blue-50 rounded-lg p-4 mb-6">
                <canvas id="leadershipChart" class="w-full h-80"></canvas>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-300 shadow-sm rounded-md">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 border">Leadership Style</th>
                            <th class="px-4 py-3 border">Score</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($stylesCount as $style => $count)
                            <tr>
                                <td class="px-4 py-3 text-gray-800">{{ $style }}</td>
                                <td class="px-4 py-3 font-semibold text-blue-600">{{ $count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
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
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
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
                    text: 'Leadership Style Scores'
                }
            }
        }
    });
</script>
@endpush
