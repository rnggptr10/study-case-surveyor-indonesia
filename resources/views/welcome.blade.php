<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surveyor Indonesia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-100 via-white to-blue-100 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">
            Pengisian Survey di Surveyor Indonesia
        </h1>
        <p class="text-gray-600 text-lg mb-6">
            Selamat datang! Silakan login untuk mulai mengisi survey.
        </p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Login
            </a>
        </div>
    </div>
</body>
</html>
