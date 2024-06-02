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

    <!-- Bootstrap Alerts -->
    <div id="alertContainer" class="alert-container"></div>

    <form id="taskForm">
        <div class="form-group">
            <label for="taskInput">New Task</label>
            <input type="text" class="form-control" id="taskInput" required>
            <input type="hidden" id="taskIndex" value="">
        </div>
        <div class="form-group">
            <label for="taskDescription">Description</label>
            <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="taskSubmitBtn">Add Task</button>
    </form>

    <ul id="taskList" class="list-group mt-3">
        <!-- Task items will be inserted here dynamically -->
    </ul>

</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="assets/main.js"></script>

</body>
</html>
