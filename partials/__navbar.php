<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><?php echo SITE_NAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>     <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>     <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>     <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>     <li class="nav-item active">
        <a class="nav-link" href="">&nbsp; <span class="sr-only">(current)</span></a>
      </li>     
<?php 

try {


$user = new User();

if( $user -> checkIsUserLoggedIn()){
?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome back , <?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['last_name'] ?> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="my-account.php">My account</a>
          <a class="dropdown-item" href="change-account.php">Change account</a>
          <a class="dropdown-item" href="my-topics.php">My topics</a>
          <a class="dropdown-item" href="my-replies.php">My replies</a>
          <a class="dropdown-item" href="my-messages.php">My messages</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Logout</a>
        </div>
      </li>

<?php

} else {

?>
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome back , Guest 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="reset-password.php">Reset password</a>
          
          
        </div>
      </li>

<?php


}


} catch ( PDOException $e ){
  echo $e -> getMessage();
}



?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>