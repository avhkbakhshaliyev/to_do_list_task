<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Todo List</h1>
            <a href="<?=base_url('user/logout')?>" class="btn btn-warning">Logout</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-tasks">

            </tbody>
        </table>
        <a href="tasks/add" class="btn btn-success mt-3">Add New Task</a>
        <a href="#" data-role="test" class="btn btn-success mt-3">Test</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/assets/tasks/tasks.js"></script>
    <script src="/assets/tasks/delete.js"></script>
    <script src="/assets/tasks/completed.js"></script>
</body>
</html>
