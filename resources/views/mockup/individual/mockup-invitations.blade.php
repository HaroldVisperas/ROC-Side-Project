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
    <h1>INVITATIONS</h1>
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

    @foreach($invitations as $invitation)
        <div>
            <p>Hello {{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}! You are invited to join {{ $invitation->affiliation }} as an {{ $invitation->role }}.</p>
            <form method="POST" action="{{ route('mockup.invitation.update') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $invitation->email }}">
                <input type="hidden" name="employee_id" value="{{ $invitation->employee_id }}">
                <input type="hidden" name="affiliation" value="{{ $invitation->affiliation }}">
                <input type="hidden" name="role" value="{{ $invitation->role }}">
                <button type="submit">Accept</button>
            </form>
            <form method="POST" action="{{ route('mockup.invitation.delete') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $invitation->email }}">
                <button type="submit">Decline</button>
            </form>
        </div>
    @endforeach

    <form method="GET" action="{{ route('mockup.dashboard.create') }}">
        @csrf
        <button type="submit">Back</button>
    </form>
</body>
</html>