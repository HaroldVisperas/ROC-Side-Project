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
    <h1>Edit Announcement</h1>
    <div>
        <h1>Welcome, Admin {{ auth()->user()->name }}</h1>
    </div>
    <div>
        <p> This is the expected dashboard page where users will land after a successful login depending on their role.<br>
            This is only a sample dashboard page. A better webpage is currently in development<br>
            <b>Fighting developers!!</b>
        </p>
    </div>
    <div>
        <form method="POST" action="{{ route('administrator.update.announcement', ['id' => $announcement->id]) }}">
            @csrf
            <div>
                <label for="title">Announcement Title:</label>
                <input type="text" name="title" id="title" value="{{ $announcement->title ?? '' }}">
            </div>
            <div>
                <label for="content">Announcement Content:</label>
                <textarea name="content" id="content" cols="30" rows="10">{{ $announcement->content ?? '' }}</textarea>
            </div>
            <div>
                <label for="link_text">Link Text:</label>
                <input type="text" name="link_text" id="link_text" value="{{ $announcement->link_text ?? '' }}">
            </div>
            <div>
                <label for="link_url">Link URL:</label>
                <input type="text" name="link_url" id="link_url" value="{{ $announcement->link_url ?? '' }}">
            </div>
            <button type="submit">Update Post</button>
        </form>
    </div>
    <div>
        <form method="POST" action="{{ route('administrator.delete.announcement', $announcement->id) }}">
            @csrf
            <button type="submit">Delete Post</button>
        </form>
    </div>
    <div>
        <form method="GET" action="{{ route('administrator.create') }}">
            @csrf
            <button type="submit">Back</button>
        </form>
    </div>
</body>