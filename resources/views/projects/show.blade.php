<!doctype html>
<html>

<head>
    <title></title>
</head>
<body>
    <h1>{{ $project->title }}</h1>
    <div>{{ $project->description }}</div>

    @foreach($project->tasks as $task)
        <div class="card mb-3">{{ $task->body }}</div>
    @endforeach

</body>
</html>
