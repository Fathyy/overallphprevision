<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Display table</title>
</head>
<body>
  <div class="container">
      <button class="btn btn-primary"><a href="create.php" class="text-light">Add user</a></button>

      <!-- table starts -->
      <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
              <tr>
                  <th scope="col">SI no</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
              </tr>
          </thead>

          <tbody>
              <?php
              $query = "SELECT * FROM persons";
              $result = mysqli_query($connection, $query);
              if($result){
                  while ($row=mysqli_fetch_assoc($result)){
                      $id=$row['id'];
                      $email=$row['email'];
                      $password=$row['password'];
                      echo '<tr>
                      <th scope ="row"> '.$id.'</th>
                      <td>'.$email.'</td>
                      <td>'.$password.'</td>
                      <td>
                      <button class="btn btn-primary"><a href="update.php?
                      updateid='.$id.'" class="text-light">Update</a></button>

                      <button class="btn btn-danger"><a href="delete.php?
                      deleteid='.$id.'" class="text-light">Delete</a></button>
                      </td>
                      </tr>';
                  }
              }
              ?>
              
          </tbody>
      </table>
  </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
</body>
</html>