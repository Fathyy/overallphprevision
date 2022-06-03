<?php
$title = 'index page';
require_once "includes/header.php";

?>

 <h1 class="text-center">Registration for IT conference</h1>

 <form>
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter first name"> 
        </div>

        <div class="form-group mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter last name"> 
        </div>

        <div class="form-group mb-3">
            <label for="dob" class="form-label">Date of birth</label>
            <input type="text" class="form-control" id="dob"> 
        </div>

        <div class="form-group mb-3">
            <label for="specialty" class="form-label">Area of expertise</label>
            <select class="form-select" aria-label="Default select example" id="specialty">
                <option selected>Open this select menu</option>
                <option value="1">Datbase Admin</option>
                <option value="2">Software Developer</option>
                <option value="3">Web administrator</option>
             </select>
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>

 <?php require_once "includes/footer.php";?>
    