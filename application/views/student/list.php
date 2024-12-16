<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/assets/student/students.js"></script>
    <script src="/assets/student/delete.js"></script>
  </head>
  <body>
    <input type="text" data-role="search" class="form-control mb-3" placeholder="Search students...">
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th data-uni="<?=$uni?>">Name</th>
          <th>Age</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-students">
      </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
