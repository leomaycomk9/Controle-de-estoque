@extends('layouts.app')

@section('content')
<div class="login-page">
    
    <div class="login-card">

        <div class="login-header">
            <h1>Welcome</h1>
            <p>log in to your account to continue</p>
        </div>

        @include('forms.user')

    </div>

</div>

@endsection
