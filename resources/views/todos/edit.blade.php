<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App (Dark Theme)</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/main.css">

</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Edit Todo</h1>

    @if(session('success'))

        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <!-- Bootstrap Alerts -->
    <div id="alertContainer" class="alert-container"></div>

    <form id="taskForm" action="{{route('update',$todo->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="taskInput">Task</label>
            <input type="text" class="form-control" id="taskInput" name="title" value="{{$todo->title}}" >
            @error('title')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
            <input type="hidden" id="taskIndex" value="">
        </div>
        <div class="form-group">
            <label for="taskDescription">Description</label>
            <textarea class="form-control" id="taskDescription" name="description" rows="3" >{{$todo->description}}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" id="taskSubmitBtn">Edit Task</button>
    </form>

</div>


</body>
</html>
