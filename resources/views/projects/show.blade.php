<!doctype html>
<html>

<head>
    <title></title>
</head>
<body>
    <h1>{{ $project->title }}</h1>
    <div>{{ $project->description }}</div>

    @foreach($project->tasks as $task)
        <div class="card mb-3">
            <input name="body" value="{{ $task->body }}">
        </div>
    @endforeach
        <div class="card mb-3">
            <form method="POST" action="{{ $project->path() . '/tasks' }}">
                @csrf

                <input placeholder="Add a new task..." class="w-full" name="body">
            </form>
        </div>

</body>
</html>
