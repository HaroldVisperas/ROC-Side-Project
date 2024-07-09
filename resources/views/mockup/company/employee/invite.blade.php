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

    <div>
        <h2>Invite Company Employees</h2>
        <form method="POST" action="{{ route('mockup.employees.store.invite') }}">
            @csrf
            <div>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="employee_id">Employee ID:</label>
                <input type="number" name="employee_id" id="employee_id" required>
            </div>
            <div>
                <label for="role">Position:</label>
                <select name="role" id="role" required>
                    <option value="administrator">Administrator</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
            <input type="hidden" name="affiliation" value="Universal Studios">
            <button type="submit">Invite</button>
        </form>
    </div>

    <form method="GET" action="{{ route('mockup.employees.create') }}">
        @csrf
        <button type="submit">Back</button>
    </form>
</body>
</html>