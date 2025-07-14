
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 0;
            font-family: "Roboto",Arial,sans-serif;
            background-color:  #f8f9fa;
        }
        .feature-section{
            padding: 60px 20px;
            text-align: center;
             background-color:  #f8f9fa;
        }
        .feature-section p{    
        font-size: 20px;
       font-weight: 600px;
       margin-bottom: 20px;
       color: #343a40;
        }
        .feature-section h2{
            font-size: 25px;
            font-weight: 700;
            margin-bottom:40px ;
            color: #343a40;
        }
        .features-container{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        .feature-card
        {
            background:  #f8f9fa;
            border-radius: 12px;
            padding: 30px;
            width: 300px;
            box-shadow:  0 4px 12px rgba(0, 0, 0, 0.08);
            transition:  transform 0.3s ease;box-shadow: 0.3s ease;
        }
        .feature-card:hover{
            transform: translateY(-13px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .feature-icon{
            font-size: 40px;
            margin-bottom: 20px;
            color: #6f42c1;
        }
        .feature-title
        {
            font-size:20px ;
            font-weight: bold;
            margin-bottom: 15px;
            color: #212529;
        }
        .feature-description
        {
            font-size: 16px;
            font-weight: 800;
            color:#555;
            margin-bottom: 12px;
        }
     .feature-btn a {
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: white;
      display: inline-block;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .feature-btn a:hover{
         background-color: #0056b3;
    }
    .feature-btn-a a{
     text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      border-color:#ce4141ff;
      background-color: #ce4141ff;
      color: white;
      display: inline-block;
      font-weight: bold;
      transition: background-color 0.3s ease
    }
    .feature-btn-a a:hover{
         background-color: #874545ff;
    }
 .feature-btn-b a{
     text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      border-color:#32CD32;
      background-color: #32CD32;
      color: white;
      display: inline-block;
      font-weight: bold;
      transition: background-color 0.3s ease
    }
    .feature-btn-b a:hover{
        background-color: #477d47ff;
    }
        @media (max-width:786px) {
            .features-container{
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <section  class="feature-section">
        <h2>Powerful Features</h2>
        <p>Everything you need to manage your Personal Finances</p>
        <div class="features-container">
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <div class="feature-title">Track Income</div>
                <div class="feature-description">Record your income from various sources and monitor your financial growth</div>
                <div class="feature-btn"><a href="income.php">Explore</a></div> 
            </div>
            <div class="feature-card">
                <div class="feature-icon">🧾</div>
                <div class="feature-title">Monitor Expenses</div>
                <div class="feature-description">Track where your money goes with categorized expense tracking</div>
                <div class="feature-btn-a"><a href="expense.php">Explore</a></div>
            </div>
             <div class="feature-card">
                <div class="feature-icon">🏦</div>
                <div class="feature-title">Grow Savings</div>
                <div class="feature-description">Set saving goals and watch your progress toward financial freedom.</div>
                <div class="feature-btn-b"><a href="?savings.php=true">Explore</a></div>
            </div>
        </div>
    </section>
</body>
</html>
