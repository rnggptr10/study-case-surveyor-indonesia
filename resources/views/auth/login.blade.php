@extends('layout')

@section('content')
<h2>Login</h2>
<form method="POST" action="/login">
    @csrf
    <x-alert/>
    <div class="mb-3">
        <input name="email" type="email" placeholder="Email" class="form-control">
    </div>
    <div class="mb-3">
        <input name="password" type="password" placeholder="Password" class="form-control">
    </div>
    <button class="btn btn-primary">Login</button>
</form>
@endsection
