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
    <link rel="stylesheet" href="{{ asset('assets/css/auth-verify-email-style.css') }}">
    <title>Email Verification</title>
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
        <h2><span style="color: #0077b6;">Email Verification</span></h2>
        <div class="text">
            <p class="link">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? 
                If you didn't receive the email, we will gladly send you another.</p>
            <br>
            <br>
        </div>
        <div class="d-flex justify-content-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">RESEND VERIFICATION EMAIL</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-primary logout-btn" type="submit">LOGOUT</button>
            </form>
        </div>
    </div>

</body>
</html>