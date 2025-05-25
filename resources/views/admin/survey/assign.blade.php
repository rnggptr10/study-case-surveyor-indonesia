@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <h2 class="text-2xl font-semibold text-blue-900 mb-6">Assign Survey ke User</h2>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 bg-red-100 text-red-800 px-4 py-2 rounded shadow">
                {{ session('error') }}
            </div>
        @endif

        {{-- Assign Form --}}
        <div class="bg-white p-6 rounded-lg shadow-md max-w-xl mb-10">
            <form method="POST" action="{{ route('admin.survey.assign.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="survey_id" class="block text-sm font-medium text-gray-700">Survey</label>
                    <select name="survey_id" id="survey_id" class="w-full mt-1 border border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
                        @foreach($surveys as $survey)
                            <option value="{{ $survey->id }}">{{ $survey->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="w-full mt-1 border border-gray-300 rounded px-3 py-2 shadow-sm focus:ring focus:ring-blue-200">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Assign Survey
                </button>
            </form>
        </div>

        {{-- Assigned Surveys Table --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">Survey yang Telah Di-Assign</h3>

            @forelse($surveys as $survey)
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $survey->title }}</h4>

                    @if($survey->assignedSurveys->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg">
                                <thead class="bg-blue-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium">No</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium">Nama User</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($survey->assignedSurveys as $index => $assignedSurvey)
                                        <tr class="hover:bg-blue-50">
                                            <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800">{{ $assignedSurvey->user->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800">{{ $assignedSurvey->user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada user yang di-assign.</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Tidak ada survey tersedia.</p>
            @endforelse
        </div>
    </main>
</div>
@endsection
