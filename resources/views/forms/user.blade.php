<form action="{{ route('login.store') }}" method="POST" class="login-form">
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="email" id="email">
    
        @error('email')
            <span class="error-message"> {{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password">
    
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <button class="login-button">Send</button>

    <div class="register-link">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}">Create an account</a>
    </div>
</form>