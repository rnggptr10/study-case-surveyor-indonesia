@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <h2 class="text-2xl font-semibold mb-6">Admin Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total User -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-blue-200">
                <p class="text-gray-600">Total Pengguna</p>
                <h3 class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</h3>
            </div>

            <!-- Total Assigned -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-blue-200">
                <p class="text-gray-600">Total Survey Diassign</p>
                <h3 class="text-3xl font-bold text-blue-600">{{ $totalAssigned }}</h3>
            </div>

            <!-- Total Filled -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-blue-200">
                <p class="text-gray-600">Survey Sudah Diisi</p>
                <h3 class="text-3xl font-bold text-green-600">{{ $totalFilled }}</h3>
            </div>

            <!-- Total Not Filled -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-blue-200">
                <p class="text-gray-600">Survey Belum Diisi</p>
                <h3 class="text-3xl font-bold text-red-500">{{ $totalUnfilled }}</h3>
            </div>
        </div>

        <!-- Filter -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-blue-200 mb-6">
            <form method="GET" class="flex flex-wrap gap-4 items-end">
                <div>
                    <label class="block text-sm text-gray-600">Jenis Survey</label>
                    <select name="survey_id" class="border border-gray-300 rounded px-4 py-2">
                        <option value="">Semua</option>
                        @foreach($surveys as $survey)
                            <option value="{{ $survey->id }}" {{ request('survey_id') == $survey->id ? 'selected' : '' }}>
                                {{ $survey->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-gray-600">Status</label>
                    <select name="status" class="border border-gray-300 rounded px-4 py-2">
                        <option value="">Semua</option>
                        <option value="filled" {{ request('status') == 'filled' ? 'selected' : '' }}>Sudah Diisi</option>
                        <option value="unfilled" {{ request('status') == 'unfilled' ? 'selected' : '' }}>Belum Diisi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-gray-600">Nama / Email</label>
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 rounded px-4 py-2">
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
                </div>
            </form>
        </div>
        <!-- Tabel Assigned Survey -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-blue-200">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">Daftar Survey yang Telah Di-Assign</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm">No</th>
                            <th class="px-4 py-2 text-left text-sm">Survey</th>
                            <th class="px-4 py-2 text-left text-sm">User</th>
                            <th class="px-4 py-2 text-left text-sm">Status</th>
                            <th class="px-4 py-2 text-left text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($assignedSurveys as $index => $assign)
                            <tr class="hover:bg-blue-50">
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $assignedSurveys->firstItem() + $index }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">{{ $assign->survey->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800">
                                    {{ $assign->user->name }} <br>
                                    <span class="text-xs text-gray-500">{{ $assign->user->email }}</span>
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    @if($assign->filled_at)
                                        <span class="text-green-600 font-medium">Sudah Diisi</span>
                                    @else
                                        <span class="text-red-600 font-medium">Belum Diisi</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    @if($assign->filled_at)
                                        <a href=""
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                            Detail
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-sm italic">Menunggu</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $assignedSurveys->appends(request()->query())->links() }}
            </div>
        </div>

    </main>
</div>
@endsection
