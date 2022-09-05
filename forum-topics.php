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

$forum_id = $_GET['id'];
if( !isset($forum_id)){
    header('Location:index.php');
    die();
}
$forum = new Forum();
$forum_title = $forum -> getForumDetailsById($forum_id)['title'];





} catch ( PDOException $e ){
    echo $e -> getMessage();
}



 ?>




<div class="forum-title">
                    <div class="pull-right forum-desc">
                        <samll>Total topics: 320,800</samll>
                    </div>
                    <h3><?php echo $forum_title; ?></h3>
                </div>

<?php 

if( count( $forum -> getAllTopicsByForumId($forum_id)['topics'])> 0 ){

foreach ( $forum -> getAllTopicsByForumId($forum_id )['topics'] as $topic ){
?>

  <div class="forum-item active">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="forum-icon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <a href="topic-replies.php?id=<?php echo $topic['id'] ?>" class="forum-item-title"><?php echo $topic['title'] ?></a>
                            <div class="forum-sub-title"><?php echo $topic['topic_sub_title'] ?></div>
                        </div>
                        <div class="col-md-1 forum-info">
                            <span class="views-number">
                             <?php echo $topic['views'] ?>
                            </span>
                            <div>
                                <small>views</small>
                            </div>
                        </div>
                       
                        <div class="col-md-2 forum-info">
                            <span class="views-number">

<?php echo $forum -> getNumberOfCommentsByTopicId($topic['id']) ?>


                            </span>
                            <div>
                                <small>Comments</small>
                            </div>
                        </div>
                    </div>
                </div>




<?php
}// foreach
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">

<?php 
$pages = $forum -> getAllTopicsByForumId($forum_id)['pages'];
$perPage = $forum -> getAllTopicsByForumId($forum_id)['per-page'];
if( !isset($_GET['page'])){
    $page = 1 ;
} else {
    $page = (int)$_GET['page'];
}
if( !isset($_GET['id'])){
    $id = 1 ;
} else {
    $id = (int)$_GET['id'];
}

for ( $x = 1 ; $x <= $pages ; $x++ ) {

?>
    <li class="page-item">
        <a class="page-link" href="?id=<?php echo $id; ?>&page=<?php echo $x;  ?>&per-page=<?php echo $perPage;  ?>"><?php echo $x ; ?></a>
    </li>

<?php

}// end for
 ?>



  </ul>
</nav>
<?php


} else {

    echo 'There is no topics in this forum.';
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