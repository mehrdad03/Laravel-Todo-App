<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App (Dark Theme)</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/main.css">

</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Todo App</h1>

    @if(session('success'))

        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('failed'))

        <div class="alert alert-danger">{{session('failed')}}</div>
    @endif

    <!-- Bootstrap Alerts -->
    <div id="alertContainer" class="alert-container"></div>

    <form id="taskForm" action="{{route('store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="taskInput">New Task</label>
            <input type="text" class="form-control" id="taskInput" name="title" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
            <input type="hidden" id="taskIndex" value="">
        </div>
        <div class="form-group">
            <label for="taskDescription">Description</label>
            <textarea class="form-control" id="taskDescription" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="taskSubmitBtn">Add Task</button>
    </form>


    <ul id="taskList" class="list-group mt-3">

        @foreach($todos as $item)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{$item->title}}</strong>
                    <p class="mb-0">{{$item->description}}</p>
                </div>
                <div>
                    <button type="button" class="btn btn-warning btn-sm mr-2 edit-btn" data-index="0">Edit</button>
                    <form action="{{route('delete',$item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-index="0">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    {{--   @dd($todos)--}}

</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

{{--<script src="assets/main.js"></script>--}}

</body>
</html>
