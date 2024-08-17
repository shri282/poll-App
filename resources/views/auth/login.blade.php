@extends('layouts.index')

<link rel="stylesheet" href="css/login.css">

@section('content')
<form action="{{ route('login.authenticate') }}" method="get" class="login-form">
    <div class="email">
        <label for="email">Email:</label>
        <input type="email" name="email" id=""> 
    </div>
    <div class="password">
        <label for="password">Password:</label>
        <input type="password" name="password" id="">
    </div>
    <button type="submit">Login</button>
</form>
@endsection