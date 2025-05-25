@extends('layout')

@section('content')
<div class="flex min-h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-8 bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-blue-900">Edit Pengguna</h2>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded shadow">
                ← Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-xl">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-blue-900 font-medium mb-1">Nama</label>
                    <input name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="mb-4">
                    <label class="block text-blue-900 font-medium mb-1">Email</label>
                    <input name="email" type="email" value="{{ old('email', $user->email) }}" required
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="mb-4">
                    <label class="block text-blue-900 font-medium mb-1">Password Baru (opsional)</label>
                    <input name="password" type="password" placeholder="Kosongkan jika tidak ingin mengganti password"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="mb-4">
                    <label class="block text-blue-900 font-medium mb-1">NIK</label>
                    <input name="nik" value="{{ old('nik', $user->nik) }}"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="mb-4">
                    <label class="block text-blue-900 font-medium mb-1">Unit Kerja</label>
                    <input name="unit_kerja" value="{{ old('unit_kerja', $user->unit_kerja) }}"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="mb-6">
                    <label class="block text-blue-900 font-medium mb-1">Leadership Type</label>
                    <input name="leadership_type" value="{{ old('leadership_type', $user->leadership_type) }}"
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
