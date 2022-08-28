<?php 
require_once 'include/config.inc.php';
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';

$user = new User();

if( $user -> checkIsUserLoggedIn()){
    header('Location:index.php');
    die();
}
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <?php require_once 'partials/__head.php' ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    



*[role="form"] {
    max-width: 830px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}


</style>



  </head>
  <body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

<?php require_once 'partials/__navbar.php' ?>

            <?php require_once 'partials/__top_nav.php' ?>

            <div class="ibox-content forum-container">

<?php 
try {

if( isset($_POST['userRegistration'])){

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$user = new User();
$user -> userRegistration( $first_name , $last_name , $email , $username , $password , $confirm_password );


}// main isset




} catch ( PDOException $e ){

    echo $e -> getMessage();
}




?>



<div class="container">
            <form class="form-horizontal" role="form" action="" method="POST">
                <h2>Registration</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name* </label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus name="first_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name* </label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus name="last_name">
                    </div>
                </div>
                                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Username* </label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Username" class="form-control" autofocus name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control" name="confirm_password">
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="userRegistration">Register</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->


                

            </div>
        </div>
    </div>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>