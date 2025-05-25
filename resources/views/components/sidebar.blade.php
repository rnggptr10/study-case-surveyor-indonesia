<div class="bg-blue-200 p-4 w-64 min-vh-100">
    <h3 class="text-xl font-bold mb-4">Surveyor Indonesia</h3>

    @php
        $role = session('user')->role ?? 'user';
    @endphp

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="{{ $role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
               class="block py-2 px-3 rounded hover:bg-blue-400 text-dark">
               Dashboard
            </a>
        </li>

        @if($role === 'admin')
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}"
                   class="block py-2 px-3 rounded hover:bg-blue-400 text-dark">
                   User
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.survey.index') }}"
                   class="block py-2 px-3 rounded hover:bg-blue-400 text-dark">
                   Survey
                </a>
            </li>
        @endif

        <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-start py-2 px-3 rounded bg-blue-600 hover:bg-blue-500 text-white">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
