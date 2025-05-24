@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Pertanyaan Survey</h2>

    {{-- Tombol tambah pertanyaan --}}
    <div class="mb-4">
        {{-- <a href="{{ route('admin.survey.create') }}" class="btn btn-success">+ Tambah Pertanyaan</a> --}}
    </div>

    {{-- Daftar pertanyaan dan opsi --}}
    @forelse ($questions as $index => $question)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5>No. {{ $index + 1 }}</h5>
                        <p><strong>Situasi:</strong> {{ $question->situation }}</p>
                    </div>
                    <div>
                        {{-- <a href="{{ route('admin..edit', $question->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                        {{-- <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form> --}}
                    </div>
                </div>

                {{-- Tampilkan semua opsi jawaban --}}
                <ul class="list-group mt-3">
                    @foreach($question->options as $option)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $option->option }}.</strong> {{ $option->text }}
                                <br>
                                <small class="text-muted">Gaya:
                                    <span class="badge
                                        {{
                                            $option->style == 'Telling' ? 'bg-danger' :
                                            ($option->style == 'Selling' ? 'bg-warning text-dark' :
                                            ($option->style == 'Participating' ? 'bg-info text-dark' :
                                            ($option->style == 'Delegating' ? 'bg-success' : 'bg-secondary')))
                                        }}">
                                        {{ $option->style }}
                                    </span>
                                </small>
                            </div>
                            <div>
                                <a href="" class="btn btn-sm btn-outline-primary">Edit</a>
                                {{-- <form action="{{ route('admin.answers.destroy', $option->id) }}" method="POST" class="d-inline"> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus opsi ini?')">Hapus</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>

                {{-- Tombol tambah opsi jawaban --}}
                <div class="mt-3">
                    {{-- <a href="{{ route('admin.answers.create', ['question_id' => $question->id]) }}" class="btn btn-outline-success btn-sm">+ Tambah Opsi</a> --}}
                </div>
            </div>
        </div>
    @empty
        <p>Tidak ada pertanyaan ditemukan.</p>
    @endforelse
</div>
@endsection
