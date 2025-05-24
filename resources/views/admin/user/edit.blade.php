@extends('layout')

@section('content')
<h2>Edit User</h2>
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf @method('PUT')
    <input name="name" value="{{ $user->name }}" required><br>
    <input name="email" value="{{ $user->email }}" required><br>
    <input name="password" placeholder="New Password (optional)" type="password"><br>
    <input name="nik" value="{{ $user->nik }}"><br>
    <input name="unit_kerja" value="{{ $user->unit_kerja }}"><br>
    <input name="leadership_type" value="{{ $user->leadership_type }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
