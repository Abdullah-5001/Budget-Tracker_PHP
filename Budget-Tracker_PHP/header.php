<!-- header.php -->
 <?php
 include_once "session.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Budget Tracker | Pro</title>

  <!-- ✅ Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- ✅ Custom Styles -->
  <style>
    .bg-cover {
      background-image: 
        linear-gradient(135deg, rgba(44, 62, 80, 0.9), rgba(44, 130, 187, 0.8)),
        url('home.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      min-height: 100vh;
      padding-bottom: 60px;
    }

    .content-wrapper {
      background-color: rgba(255, 255, 255, 0.85); 
      padding: 40px;
      border-radius: 10px;
      margin: 0 auto;
      max-width: 1200px;
    }

    .navbar .nav-link {
      color: white !important;
      font-weight: bold;
    }

    .navbar .btn {
      color: white !important;
      background-color: transparent;
      border: none;
    }

    .navbar .btn:hover {
      background-color: white;
      color: #000 !important;
    }

    /* ✅ Updated select styling */
    .feature-select {
      background-color: rgba(44, 62, 80, 0.9); /* same as header background */
      color: white;
      border: none;
      font-size: 35px;
      padding: 4px 8px;
      width: auto;
      min-width: 130px;
      height: auto;
    }

    .feature-select:focus {
      background-color: white;
      color: black;
      box-shadow: none;
    }
    select.btn option {
  color: black;
  background-color: white;
}


    .feature-select option {
      color: black;
    }
  </style>
</head>
<body>

<!-- ✅ Background wrapper starts in index.php -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, rgba(44, 62, 80, 0.9), rgba(44, 130, 187, 0.8));">
  <div class="container-fluid px-4">
    <a class="navbar-brand text-white fw-bold fs-3" href="index.php">Budget Tracker | Pro</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
       <li class="nav-item ms-2"><a href="index.php" class="btn">Home</a></li>
       <?php
          if(isset($_SESSION['user']['username']))
       {
    // Show logged-in user links
     ?>
        <li class="nav-item"><a class="nav-link" href="income.php">Income</a></li>
        <li class="nav-item"><a class="nav-link" href="expense.php">Expense</a></li>
        <li class="nav-item"><a class="nav-link" href="savings.php">Savings</a></li>
        <li class="nav-item"><a class="nav-link" href="reports.php">Reports</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
      <?php
        }
        else
        {
        ?>
        <li class="nav-item ms-2"><a href="contact.php" class="btn">Contact</a></li>
        <li class="nav-item ms-2"><a href="contact.php" class="btn">About</a></li>
       <li class="nav-item ms-2"><a href="registeration.php" class="btn">Signup</a></li>
       <li class="nav-item ms-2"><a href="login.php" class="btn">Login</a></li>
       <?php
        }
       ?>
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
