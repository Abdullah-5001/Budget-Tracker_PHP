<?php
include_once "session.php";
 ?> 
<?php
include_once "db_actions.php";
if(isset($_POST['add']))
//    declaring error array to use and display error message and count
{    
$errors=[];
 $username = $_SESSION['user']['username'] ?? null;
    // title input
    $title= filter_input(INPUT_POST,'title',
                              FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($title))
    {
        $errors[]= "title is empty ";
    }  if(strlen($title )<3 ||strlen( $title)>255)
    {
        $errors[] = "title mst be of appropriate size";
    }
    // Description input
    $description = filter_input(INPUT_POST,'description',
                     FILTER_SANITIZE_SPECIAL_CHARS);
                    //  amount input
    $amount = filter_input(INPUT_POST,'amount',
                            FILTER_VALIDATE_INT);
    $cr_date =date("Y-m-d");
    $month = date("F");
    $year = date("Y");
    if(empty($errors))
    {
        try {
            
      if( save_expense( $username,$title,$description,$amount,$cr_date,$month,$year ) )
           {
            header("Location: /DemoWebsite/view_expense.php");
            exit();
        }
        //    }   else {
        //     echo "income not saved";
        //    }
         } 
           catch (\Throwable $th) {
            $errors[]="An error occured". $th->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Page</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div style="background-image:url(expense.jpg);background-size:cover; width:100%; background-position:center;"  class="container  d-flex vh-100 justify-content-center align-items-center" >
        <div class="card shadow p-4" style="max-width: 500px; width: 1000%; height:auto;">
            <div class="sm-3  col-6 offset-sm-3"><h2 style="text-align: center;">Expense</h2></div>
        <form action="expense.php" method="post">
            <div class="mb-4 my-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
      </div>
         <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter Description" >
      </div>
         <div class="mb-4 ">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="Enter amount" required >
      </div>
      <div class="mb-4">
        <button type="submit" name="add" class="btn btn-success form-control" >Add</button>
      </div>
        
        </form>
        </div>
    </div>
</body>
</html>
