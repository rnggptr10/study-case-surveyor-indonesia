@extends('layout')
@section('content')
<h2>Users</h2>
<a href="{{ route('admin.users.create') }}">+ Add User</a>

<x-table :headers="['Name', 'Email', 'Actions']">
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete user?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</x-table>
@endsection
