@extends('layout')

@section('content')
<div class="flex min-h-screen bg-gradient-to-r from-blue-100 via-white to-blue-100">
    @include('components.sidebar')

    <main class="flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">Welcome, {{ session('user')->name }}</h2>

        <div class="">
            <h3 class="text-lg font-medium mb-4">Daftar Survey yang Ditugaskan</h3>

            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Survey</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignedSurveys as $index => $assigned)
                        <tr>
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $assigned->survey->title }}</td>
                            <td class="px-4 py-2 border text-center">
                                @if ($assigned->filled_at)
                                    <a href="{{ route('user.survey.result', $assigned->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Lihat Hasil</a>
                                @else
                                    <a href="{{ route('user.surveys.fill', $assigned->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Isi Survey</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">Belum ada survey yang ditugaskan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
