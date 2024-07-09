<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="icon" href="images/roc.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-task.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kanban Board</title>
</head>
<body>
    <!-- KANBAN -->
    <div class="container upperDashboard">
        <div class="row justify-content-start">
            <h1> Kanban Board </h1>
        </div>
    </div>
    <div class="container-fluid" id="kanban-table">
        <div class="row mt-5">
            <div class="col kanban bg-todo border-start border-top border-3">
                <h2 class="text-light noscrolly text-center topspace2">Todo</h2>
            </div>
            <div class="col kanban bg-working border border-bottom-0 border-3">
                <h2 class="text-light noscrolly text-center topspace2">Working</h2>
            </div>
            <div class="col kanban bg-approval border-end border-top border-3">
                <h2 class="text-light noscrolly text-center topspace2">For Approval</h2>
            </div>
            <div class="col kanban bg-done border-end border-top border-3">
                <h2 class="text-light noscrolly text-center topspace2">Done</h2>
            </div>
            <div class="row"></div>
            <div class="col kanban-space bg-todo border-start border-bottom border-3 border-primary">
                <h2 class="text-light noscrolly text-center"></h2>
                @foreach ($tasks as $task)
                @if ($task->status === 'todo')
                <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                    {{ $task->title }}
                    <button class="btn-close" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
                <button type="button" class="btn btn-secondary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#todoModal">+Add Todo</button>
            </div>
            <div class="col kanban-space bg-working border-bottom border-3 border-primary">
                <h2 class="text-light noscrolly text-center"></h2>
                @foreach ($tasks as $task)
                @if ($task->status === 'working')
                <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                    {{ $task->title }}
                    <button class="btn-close" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
            </div>
            <div class="col kanban-space bg-approval border-bottom border-3 border-primary">
                <h2 class="text-light noscrolly text-center"></h2>
                @foreach ($tasks as $task)
                @if ($task->status === 'approval')
                <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                    {{ $task->title }}
                    <button class="btn-close" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
            </div>
            <div class="col kanban-space bg-done border-bottom border-end border-3 border-primary">
                <h2 class="text-light noscrolly text-center"></h2>
                @foreach ($tasks as $task)
                @if ($task->status === 'done')
                <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                    {{ $task->title }}
                    <button class="btn-close" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="todoModal" tabindex="-1" aria-labelledby="todoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="todoModalLabel">Add a new todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('brand.tasks.store') }}">
                        @csrf
                        <input type="text" id="todoInput" name="title" class="form-control mb-3"
                            placeholder="Enter your task" required>
                        <button type="submit" class="btn btn-success w-100" id="todoSubmit">Add Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form method = "GET" action="{{ route('company.dashboard.create') }}">
            <button type="submit" class="btn btn-primary">Back to Dashboard</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/kanban.js') }}"></script>
</body>
</html>
