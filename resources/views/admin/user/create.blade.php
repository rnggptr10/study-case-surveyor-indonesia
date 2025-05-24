@extends('layout')

@section('content')
<h2>Create User</h2>
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <input name="name" placeholder="Name" required><br>
    <input name="email" placeholder="Email" type="email" required><br>
    <input name="password" placeholder="Password" type="password" required><br>
    <button type="submit">Submit</button>
</form>
@endsection
