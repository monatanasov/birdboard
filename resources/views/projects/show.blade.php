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
            <form method="POST" action="{{ $task->path() }}">
                @method('PATCH')
                @csrf

                <input name="body" value="{{ $task->body }}" class="{{ $task->completed ? 'text-grey-500' : '' }}">
                <input name="completed" type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            </form>
        </div>

{{--        @dd($_POST);--}}

    @endforeach
        <div class="card mb-3">
            <form method="POST" action="{{ $project->path() . '/tasks' }}">
                @csrf

                <input placeholder="Add a new task..." class="w-full" name="body">
            </form>
        </div>

    <div>
        <h2 class="">General Notes</h2>

        <textarea class="" style="min-height: 200px">{{ $project->notes }}</textarea>

        
    </div>

</body>
</html>
