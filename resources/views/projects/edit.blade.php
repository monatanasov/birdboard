<!doctype html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">

</head>
<body>


<form method="POST" action="{{ $project->path() }}" class="container" style="padding-top: 40px">
    @csrf
    @method('PATCH')
    <h1 class="heading is-1">Edit Your Project</h1>


    <div class="field">
        <label class="label" for="title">Title</label>

        <div class="control">
            <input type="text" class="input" name="title" placeholder="My awesome project" value="{{ $project->title }}">
        </div>
    </div>

    <div class="field">
        <label class="label" for="description">Description</label>

        <div class="control">
            <textarea name="description" class="textarea" placeholder="I should start learning piano.">{{ $project->description }}</textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update Project</button>

            <a href="{{ $project->path() }}">Cancel</a>
        </div>
    </div>

</form>



</body>
</html>
