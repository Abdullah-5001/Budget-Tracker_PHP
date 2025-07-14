<?php
include_once "header.php"; // Make sure session_start is in header
include_once "db_actions.php";

$username = $_SESSION['user']['username'] ?? null;

if (!$username) {
    echo "<div class='alert alert-danger text-center'>User not logged in.</div>";
    exit;
}

$result = savings($username);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Savings Summary</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h2 class="text-center mb-4">Savings Overview</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center">
            <h4><?= htmlspecialchars($username) ?>'s Summary</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead class="table-light">
                <tr>
                  <th>Total Income</th>
                  <th>Total Expense</th>
                  <th>Savings</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Rs. <?= number_format($data['Total_income']) ?></strong></td>
                  <td><strong>Rs. <?= number_format($data['Total_expense']) ?></strong></td>
                  <td><strong class="<?= $data['Savings'] < 0 ? 'text-danger' : 'text-success' ?>">
                    Rs. <?= number_format($data['Savings']) ?>
                  </strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-center">
            <a href="features.php" class="btn btn-outline-primary">← Back to Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "footer.html"; ?>
</body>
</html>
