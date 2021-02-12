<!doctype html>
<html lang="en">
  <head>
    <title>User System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.linky {
    color: #FFFFFF;
    text-decoration:none;
}

</style>
</head>
  
  <body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-warning">
      <a class="navbar-brand" href="index.php">User System</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="diary.php">Diary</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="todo.php">To Do List</a>
              </li>
           
          </ul>
            <ul class="nav navbar-nav navbar-right">
                   
                <div class="dropdown open">
                    <a class="btn btn-warning dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                Profile
                            </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item">Welcome <?php echo $_SESSION['username']; ?></a>
                            
                            <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </ul>

   
      </div>
  </nav>