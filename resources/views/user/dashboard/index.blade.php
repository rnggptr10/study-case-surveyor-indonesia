@extends('layout')
@section('content')
<h2>User Dashboard</h2>
<p>Welcome, {{ session('user')->name }}</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger">Logout</button>
</form>
@endsection
