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
    </main>
</div>
@endsection
