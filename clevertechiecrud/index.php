<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
      <?php require_once 'process.php'?>
      <?php
      require 'db.php';
      $result=$mysqli->query("SELECT * FROM data") or die($mysqli->error);
       
      ?>


      <!-- form begins here -->
      <div class="container">
          <div class="d-flex row justify-content-center align-items-center">
  <form action="process.php" method="POST">

  <div class="form-group mb-3">
    <label for="exampleInputname1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputlocation" class="form-label">Location</label>
    <input type="text" class="form-control" name="location" >
  </div>

   <div class="form-group">
  <button type="submit" class="btn btn-primary" name="save">Save</button>
  </div>
</form>
</div>
      </div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>
