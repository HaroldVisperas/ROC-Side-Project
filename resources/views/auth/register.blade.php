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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/js/intlTelInput.min.js"></script>
    <link rel="icon" href="{{ asset('assets/images/roc.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-register-style.css') }}">
    <title>Register</title>
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
        <h2>Sign Up to <span style="color: #0077b6;">ROC.PH</span></h2>

        <form id="registerForm" method="POST" action="{{route('register') }}">
        @csrf
        @method('POST')
            <div class="col" id="firstPage">
                
                <div> <!-- ------------------------------------------------------ -->
                    <label for="firstname">First Name*</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                    <span class="text-danger">@error('firstname') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <div> <!-- ------------------------------------------------------ -->
                    <label for="middlename">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" placeholder="Enter Middle Name">
                    <span class="text-danger">@error('middlename') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <div> <!-- ------------------------------------------------------ -->
                    <label for="lastname">Last Name*</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                    <span class="text-danger">@error('lastname') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <div> <!-- ------------------------------------------------------ -->
                <label for="email">Email Address*</label>
                <input type="text" name="email" id="email" placeholder="Enter Email Address">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <button type="button" class ="submit" id="next">Next Page</button>
            </div>

            <div class="col" id="secondPage">
                <div> <!-- ------------------------------------------------------ -->
                    <label for="phone_num">Phone Number*</label>
                    <input type="tel" name="phone_num" id="phone_num">
                    <span class="text-danger">@error('phone_num') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <div> <!-- ------------------------------------------------------ -->
                <label for="password">Password*</label>
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <div> <!-- ------------------------------------------------------ -->
                <label for="password_confirmation">Confirm Password*</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div> <!-- ------------------------------------------------------ -->

                <p id="errorMessage" style="color:red"></p>

                <div class="row">
                    <div class="col">
                        <button type="button" id="previous">Previous</button>
                    </div>
                    <div class="col">
                        <button type="submit">Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/js/register.js') }}"></script>

</body>
</html>