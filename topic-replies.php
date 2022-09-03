<?php 
require_once 'include/config.inc.php';
require_once 'include/db.inc.php';
require_once 'include/class_autoloader.inc.php';


 ?>
 <!doctype html>
<html lang="en">
  <head>
    <?php require_once 'partials/__head.php' ?>
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

$forum = new Forum();
$user = new User();
$topic_id = $_GET['id'];

if( count( $forum -> getAllRepliesByTopicId($topic_id)) > 0 ){

foreach ( $forum -> getAllRepliesByTopicId($topic_id ) as $reply ){

?>

<div class="container-fluid mt-100">
     <div class="row">
         <div class="col-md-12">
             <div class="card mb-4">
                 <div class="card-header">
                     <div class="media flex-wrap w-100 align-items-center"> <img src="https://i.imgur.com/iNmBizf.jpg" class="d-block ui-w-40 rounded-circle" alt="">
                         <div class="media-body ml-3"> <a href="javascript:void(0)" data-abc="true"><?php echo $user ->getUserDetailsById($reply['user_id'])['first_name'] ?> <?php echo $user ->getUserDetailsById($reply['user_id'])['last_name'] ?></a>
                             <div class="text-muted small"><?php echo $user ->getUserDetailsById($reply['user_id'])['last_active'] ?></div>
                         </div>
                         <div class="text-muted small ml-3">
                             <div>Member since <strong><?php echo $user ->getUserDetailsById($reply['user_id'])['created_at'] ?></strong></div>
                             <div><strong><?php echo $user ->getUserDetailsById($reply['user_id'])['replies_count'] ?></strong> replies</div>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     
                     <?php echo $reply['content'] ?>
                 </div>
                 <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                     <div class="px-4 pt-3"> 
                        <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                            <i class="fa fa-heart text-danger"></i>&nbsp; 
                            <span class="align-middle">
                                <?php echo $reply['likes'] ?>
                                
                            </span> 
                        </a> 
                                                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                            <i class="fa fa-heart text-danger"></i>&nbsp; 
                            <span class="align-middle">
                                <?php echo $reply['dislikes'] ?>
                                
                            </span> 
                        </a>
                        </div>
                     
                 </div>
             </div>
         </div>
     </div>
 </div>
<?php
}// end foreach

} else {

    echo 'This topic dont have any reply.';
}


} catch ( PDOException $e ){
    echo $e -> getMessage();
}




 ?>

                

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