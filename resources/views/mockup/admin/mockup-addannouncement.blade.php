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
    <h1>Add Announcement</h1>
    <div>
        <h1>Welcome, Admin {{ auth()->user()->name }}</h1>
    </div>
    <div>
        <p> This is the expected dashboard page where users will land after a successful login depending on their role.<br>
            This is only a sample dashboard page. A better webpage is currently in development<br>
            <b>Fighting developers!!</b>
        </p>
    </div>
    
    <form method="POST" action="{{ route('mockup.administrator.store.announcement') }}">
        @csrf
        <div>
            <label for="title">Announcement Title:</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Announcement Content:</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="link_text">Link Text:</label>
            <input type="text" name="link_text" id="link_text">
        </div>
        <div>
            <label for="link_url">Link URL:</label>
            <input type="text" name="link_url" id="link_url">
        </div>
        <button type="submit">Post</button>
    </form>
    <div>
        <form method="GET" action="{{ route('mockup.dashboard.create') }}">
            @csrf
            <button type="submit">Back</button>
        </form>
    </div>

    @foreach($announcements as $announcement)
        <div>
            <h3>{{ $announcement->title }}</h3>
            <p style="color:blue;">{{ $announcement->updated_at->format('F j, Y') }}</p>
            <p style="color:blue;">{{ $announcement->updated_at->format('g:i a') }}</p>
            <p>{{ $announcement->content }}</p>
            <form method="GET" action="{{ route('mockup.administrator.edit.announcement', ['id' => $announcement->id]) }}">
                @csrf
                <button type="submit">Edit</button>
            </form>
            <form method="POST" action="{{ route('mockup.administrator.delete.announcement', $announcement->id) }}">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

</body>
</html>