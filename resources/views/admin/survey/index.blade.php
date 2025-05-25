@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <h2 class="text-2xl font-semibold text-blue-900 mb-6">Daftar Survey</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Judul Survey</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($surveys as $index => $survey)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $survey->title }}</td>
                            <td class="px-6 py-4 text-sm flex space-x-2">
                                <a href="{{ route('admin.survey.show', $survey->id) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                                    Detail
                                </a>
                                <a href="{{ route('admin.survey.assign.index', $survey->id) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
                                    Assign
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-600">Tidak ada survey ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
