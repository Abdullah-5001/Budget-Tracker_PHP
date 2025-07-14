<?php
include_once "header.php";
include_once "db_actions.php";

$username = $_SESSION['user']['username'] ?? null;

if (!$username) {
    echo "<div class='alert alert-danger text-center'>You must be logged in to view reports.</div>";
    exit;
}

$result = Summary($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Monthly Financial Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h2 class="text-center mb-4">Monthly Financial Report</h2>

    <?php if ($result && $result->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
          <thead class="table-dark">
            <tr>
              <th>Month</th>
              <th>Year</th>
              <th>Total Income (Rs)</th>
              <th>Total Expenses (Rs)</th>
              <th>Savings (Rs)</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= date('F', mktime(0, 0, 0, $row['Month'], 1)) ?></td>
                <td><?= $row['YEAR'] ?></td>
                <td><?= number_format($row['Total_income']) ?></td>
                <td><?= number_format($row['Total_expenses']) ?></td>
                <td class="<?= ($row['Total_income'] - $row['Total_expenses']) < 0 ? 'text-danger' : 'text-success' ?>">
                  <?= number_format($row['Total_income'] - $row['Total_expenses']) ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-info text-center">No financial data found for your account.</div>
    <?php endif; ?>

    <div class="text-center mt-4">
      <a href="features.php" class="btn btn-outline-secondary">← Back to Dashboard</a>
    </div>
  </div>

  <?php include "footer.html"; ?>
</body>
</html>
