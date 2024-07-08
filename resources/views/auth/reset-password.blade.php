<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('assets/images/roc.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-reset-password-style.css') }}">
    <title>Reset Password</title>
</head>
<body>

    <div class="left-side">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Big Image">
    </div>

    <div class="divider-container">
        <div class="divider-section orange"></div>
        <div class="divider-section red"></div>
        <div class="divider-section green"></div>
    </div>

    <div class="right-side">
        <img src="{{ asset('assets/images/roc.png') }}" alt="Small Image">
        <h2>Reset Password?</span></h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <label for="email">Email Address*</label>
            <input type="email" id="email" name="email" required placeholder="Enter Email Address">
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
            
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" required placeholder="Enter Password">
            <span class="text-danger">@error('password') {{$message}} @enderror</span>

            <label for="password_confirmation">Confirm Password*</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Enter Confirm Password">
            <span class="text-danger">@error('password_confirmation') {{$message}} @enderror</span>  
            
            <button type="submit">RESET PASSWORD</button>

        </form>
    </div>

</body>
</html>