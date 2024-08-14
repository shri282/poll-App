@extends('layouts.index')

<link rel="stylesheet" href="css/login.css">

@section('content')
<form action="" method="get" class="login-form">
    <div class="username">
        <label for="name">User Name:</label>
        <input type="text" name="" id="">
    </div>
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