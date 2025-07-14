<?php
include_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Income</title>

  <!-- Bootstrap CSS (Optional if already included in header.php) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons (for plus icon, optional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">Your Incomes</h2>
  <div class="text-end mb-3">
    <a href="income.php" class="btn btn-success">
      <i class="bi bi-plus-circle me-1"></i> Add Income
    </a>
  </div>

<?php
include_once "db_actions.php";
$username = $_SESSION['user']['username'];
$result = view_incomes($username);
if(mysqli_num_rows($result) > 0)
{
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='table-dark'><tr><th>ID</th><th>Username</th><th>Title</th><th>Description</th><th>Date</th><th>Month</th><th>Year</th><th>Options</th></tr></thead>";
    echo "<tbody>";
    while($rows = mysqli_fetch_assoc($result))
    {
        echo "<tr>
                <td>".$rows['id']."</td>
                <td>".$rows['username']."</td>
                <td>".$rows['title']."</td>
                <td>".$rows['description']."</td>
                <td>".$rows['cr_date']."</td>
                <td>".$rows['month']."</td>
                <td>".$rows['year']."</td>
                <td>
                    <a href='edit_income.php?edit_incomeid=".$rows['id']."' class='btn btn-sm btn-primary' title='Edit'>&#9998;</a>
                    <a href='delete_income.php?delete_incomeid=".$rows['id']."' class='btn btn-sm btn-danger' title='Delete'>&#128465;</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
}
else {
    echo "<p class='text-center'>No Income found</p>";
}
?>
</div>
</body>
</html>
<?php
include_once "footer.html";
?>
