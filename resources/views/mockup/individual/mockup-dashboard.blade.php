<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="path/to/your/css/file.css"> -->
</head>
<body>
    <h1>Dashboard</h1>
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

    @if($latestAnnouncements->isNotEmpty())
        @foreach($latestAnnouncements as $latestAnnouncement)
        <div>
            <h3>{{ $latestAnnouncement->title }}</h3>
            <p style="color:blue;">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('F j, Y') }}</p>
            <p style="color:blue;">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('g:i a') }}</p>
            <p>{{ $latestAnnouncement->content }}</p>
        </div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('mockup.company.post') }}">
        @csrf
        <h1>----------------------------</h1>
        <label for="affiliation">Company Name:</label>
        <input type="text" name="affiliation" id="affiliation" required>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <button type="submit">Create Company</button>
        <h1>----------------------------</h1>
    </form>

    <div>
        <form method="GET" action="{{ route('profile.create_mockup') }}">
            @csrf
            <button type="submit">Profile</button>
        </form>
    </div>

    <div>
        <form method="GET" action="{{ route('mockup.administrator.create') }}">
            @csrf
            <input type="hidden" name="affiliation" value="{{ auth()->user()->affiliation }}">
            <button type="submit">Admin</button>
        </form>
    </div>

    <div>
        <form method="GET" action="{{ route('mockup.employees.create') }}">
            @csrf
            <input type="hidden" name="affiliation" value="{{ auth()->user()->affiliation }}">
            <button type="submit">Employees</button>
        </form>
    </div>

    <div>
        <form method="GET" action="{{ route('mockup.invitations.create') }}">
            @csrf
            <button type="submit">Invitations</button>
        </form>
    </div>

    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
</body>
</html>