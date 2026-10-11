@extends('layouts.app');

@section('content')

<form action="{{ route('register.store') }}" method="POST">
@csrf
<h1>sign up</h1>
    <div>
        @error('name')
            {{ $message }}
        @enderror
        <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div>
        @error('email')
            {{ $message }}
        @enderror
        <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div>
        @error('password')
            {{ $message }}
        @enderror
            <label for="password">Password:</label>
                <input type="password" name="password" id="password">
    </div>
    
    <div><button>to send</button></div>

</form>
@endsection
