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
    <h1>COMPANY PAGE</h1>
    <div>
        <h1>Welcome, {{ auth()->user()->name }}</h1>
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

    <form method="GET" action="{{ route('mockup.employees.create.invite') }}">
        @csrf
        <button type="submit">Invite Employee</button>
    </form>

    <h2>Current Employees:</h2>

    <h2>-----  ADMINISTRATORS  -----</h2>
    @foreach($administrators as $administrator)
        <div>
            <h3>{{ $administrator->employee_id }}</h3>
            <p>{{ $administrator->firstname }} {{ $administrator->middlename }} {{ $administrator->lastname }} </p>
            <p>{{ $administrator->role }}</p>
        </div>
    @endforeach

    <h2>-----  EMPLOYEES  -----</h2>
    @foreach($employees as $employee)
        <div>
            <h3>{{ $employee->employee_id }}</h3>
            <p>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }} </p>
            <p>{{ $employee->affiliation }}</p>
            <p>{{ $employee->role }}</p>
        </div>
    @endforeach

    <form method="GET" action="{{ route('mockup.dashboard.create') }}">
        @csrf
        <button type="submit">Back</button>
    </form>
</body>
</html>