@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <h2 class="text-2xl font-semibold text-blue-900 mb-2">Detail Survey</h2>
        <p class="text-gray-700 mb-6"><span class="font-semibold">Judul:</span> {{ $survey->title }}</p>

        @forelse ($survey->questions as $index => $question)
        <div
            class="bg-white shadow-md rounded-lg mb-4 p-6 cursor-pointer transition-all duration-300 ease-in-out"
            onclick="toggleOptions('options-{{ $question->id }}')"
        >
            <div class="flex justify-between items-center">
                <h5 class="text-lg font-semibold text-blue-900">No. {{ $index + 1 }}</h5>
                <svg id="icon-{{ $question->id }}" class="w-6 h-6 text-blue-600 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <p class="text-gray-700 mt-2"><span class="font-semibold">Situasi:</span> {{ $question->situation }}</p>

            <ul id="options-{{ $question->id }}" class="mt-4 space-y-2 overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out">
                @foreach($question->options as $option)
                <li class="flex justify-between items-center bg-blue-50 rounded p-3 shadow-sm">
                    <div>
                        <strong class="text-blue-900">{{ $option->option }}.</strong> {{ $option->text }}
                        <br>
                        <small class="text-gray-600">
                            Gaya:
                            <span class="inline-block px-2 py-0.5 rounded
                                {{
                                    $option->style == 'Telling' ? 'bg-red-500 text-white' :
                                    ($option->style == 'Selling' ? 'bg-yellow-300 text-gray-800' :
                                    ($option->style == 'Participating' ? 'bg-blue-300 text-gray-800' :
                                    ($option->style == 'Delegating' ? 'bg-green-500 text-white' : 'bg-gray-400 text-white')))
                                }}">
                                {{ $option->style }}
                            </span>
                        </small>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @empty
        <p class="text-center text-gray-600 mt-8">Tidak ada pertanyaan ditemukan dalam survey ini.</p>
        @endforelse
    </main>
</div>

<script>
    function toggleOptions(id) {
        const el = document.getElementById(id);
        const icon = document.getElementById('icon-' + id.split('-')[1]);

        if (el.style.maxHeight && el.style.maxHeight !== '0px') {
            el.style.maxHeight = '0';
            icon.style.transform = 'rotate(0deg)';
        } else {
            el.style.maxHeight = el.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>
@endsection
