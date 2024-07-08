<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="path/to/your/css/file.css"> -->
</head>
<body>
    <h1>Profile</h1>
    <div>
        <h1>Welcome, {{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</h1>
    </div>
    <div>
        <h3>Hope you have a good day!!!</h3>
    </div>
    <div>
        <p> This is the expected dashboard page where users will land after a successful login depending on their role.<br>
            This is only a sample dashboard page. A better webpage is currently in development<br>
            <b>Fighting developers!!</b>
        </p>
    </div>
    
    <form id="timezone-form" method="POST" action="{{ route('profile.update_timezone') }}">
        @csrf
        <label for="timezone">Select Timezone:</label>
        <select name="timezone" id="timezone" onchange="document.getElementById('timezone-form').submit()">
            @foreach($timezones as $timezone => $label)
                <option value="{{ $timezone }}">{{ $label }}</option>
            @endforeach
        </select>
    </form>

    <h2>Current Timezone: {{ auth()->user()->timezone }}</h2>

    <form method="GET" action="{{ route('mockup.dashboard.create') }}">
        @csrf
        <button type="submit">Back</button>
    </form>
</body>
</html>