    // Task list
    let tasks = [];

    // Function to render tasks
    function renderTasks() {
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = '';

    tasks.forEach((task, index) => {
    const li = document.createElement('li');
    li.className = 'list-group-item d-flex justify-content-between align-items-center';
    li.innerHTML = `
        <div>
          <strong>${task.title}</strong>
          <p class="mb-0">${task.description}</p>
        </div>
        <div>
          <button type="button" class="btn btn-warning btn-sm mr-2 edit-btn" data-index="${index}">Edit</button>
          <button type="button" class="btn btn-danger btn-sm delete-btn" data-index="${index}">Delete</button>
        </div>
      `;
    taskList.appendChild(li);
});
}

    // Add task
    const taskForm = document.getElementById('taskForm');
    const taskInput = document.getElementById('taskInput');
    const taskDescription = document.getElementById('taskDescription');
    const taskSubmitBtn = document.getElementById('taskSubmitBtn');
    const taskIndexInput = document.getElementById('taskIndex');
    const alertContainer = document.getElementById('alertContainer');

    taskForm.addEventListener('submit', function(event) {
    // event.preventDefault();
    const taskValue = taskInput.value.trim();
    const taskDescriptionValue = taskDescription.value.trim();
    const taskIndex = taskIndexInput.value;

    if (taskValue === '' || taskDescriptionValue === '') return;

    if (taskIndex === '') {
    // Add new task
    tasks.push({ title: taskValue, description: taskDescriptionValue });
    showAlert('Task added successfully.', 'success');
} else {
    // Edit existing task
    tasks[taskIndex] = { title: taskValue, description: taskDescriptionValue };
    taskIndexInput.value = '';
    taskSubmitBtn.innerText = 'Add Task';
    showAlert('Task updated successfully.', 'info');
}

    taskInput.value = '';
    taskDescription.value = '';
    renderTasks();
});

    // Delete task
    document.getElementById('taskList').addEventListener('click', function(event) {
    if (event.target.classList.contains('delete-btn')) {
    const index = event.target.getAttribute('data-index');
    tasks.splice(index, 1);
    renderTasks();
    showAlert('Task deleted successfully.', 'danger');
}
});

    // Edit task
    document.getElementById('taskList').addEventListener('click', function(event) {
    if (event.target.classList.contains('edit-btn')) {
    const index = event.target.getAttribute('data-index');
    const task = tasks[index];

    taskInput.value = task.title;
    taskDescription.value = task.description;
    taskIndexInput.value = index;
    taskSubmitBtn.innerText = 'Edit Task';

    // Focus on the input
    taskInput.focus();
}
});

    // Function to show alert
    function showAlert(message, type) {
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.setAttribute('role', 'alert');
    alertDiv.innerHTML = `
      ${message}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    `;

    // Show alert
    alertContainer.innerHTML = ''; // Clear previous alerts
    alertContainer.appendChild(alertDiv);

    // Automatically close the alert after 3 seconds
    setTimeout(() => {
    alertDiv.remove();
}, 3000);
}

    // Initial render
    renderTasks();

