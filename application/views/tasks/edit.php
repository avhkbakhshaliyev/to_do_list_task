<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/assets/tasks/edit.js"></script>
</head>
<body>
    <div id="overlay" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center">
      <div class="spinner-border text-light" role="status"></div>
    </div>
    <div class="container my-5">
      <h1 class="text-center mb-4">Edit Task</h1>
      <div class="mb-3">
          <label for="name" class="form-label">Task Name</label>
          <input type="text" class="form-control" name="name" value="<?=htmlspecialchars($arTask['name'])?>" data-role="name" required>
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="descr" rows="3" data-role="descr"><?=htmlspecialchars($arTask['descr'])?></textarea>
      </div>
      <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" name="status" data-role="status">
              <option value="pending" <?php if($arTask['status'] == 'pending'):?>selected<?php endif?>>Pending</option>
              <option value="in_progress" <?php if($arTask['status'] == 'in_progress'):?>selected<?php endif?>>In Progress</option>
              <option value="completed"<?php if($arTask['status'] == 'completed'):?>selected<?php endif?>>Completed</option>
          </select>
      </div>
      <div id="message"></div>
      <button class="btn btn-primary" data-role="btn-update" data-id="<?=$id?>">Update Task</button>
      <a href="/" class="btn btn-secondary">Back</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
