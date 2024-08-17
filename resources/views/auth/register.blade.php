@extends('layouts.index')

<link rel="stylesheet" href="css/login.css">

@section('content')

<form action="{{ route('user.create') }}" method="post" class="login-form">
    <div class="username">
        <label for="name">User Name:</label>
        <input type="text" name="username" id="">
    </div>
    <div class="email">
        <label for="email">Email:</label>
        <input type="email" name="email" id="">
    </div>
    <div class="password">
        <label for="password">Password:</label>
        <input type="password" name="" id="">
    </div>
    <div class="confirm-password">
        <label for="password">Confirm Password:</label>
        <input type="password" name="password" id="">
    </div>
    <button type="submit">Register</button>
</form>

@endsection