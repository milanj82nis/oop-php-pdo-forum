<?php 


class Forum extends DbConnect {



public function getAllRepliesByTopicId($topic_id ){


	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;
	$perPage = isset( $_GET['per-page']) && $_GET['per-page'] <= 5 ? (int)$_GET['per-page'] : 5 ;
	$start = ($page > 1 ) ? ($page * $perPage ) - $perPage : 0;


$sql = 'select * from replies where topic_id = :topic_id order by created_at desc LIMIT :start , :perPage';
$query = $this -> connect() -> prepare($sql);
	$query -> bindParam( ':topic_id' , $topic_id , PDO::PARAM_INT );
	$query -> bindParam( ':start' , $start , PDO::PARAM_INT );
	$query -> bindParam( ':perPage' , $perPage , PDO::PARAM_INT );
	$query -> execute();
$replies = $query -> fetchAll();



$sql = 'select * from replies where topic_id = :topic_id';
	$query = $this -> connect() -> prepare($sql);
	$query -> bindParam( ':topic_id' , $topic_id , PDO::PARAM_INT );
	$query -> execute();
	$topicCount = $query -> fetchAll();
	$allReplies = count( $topicCount);
	$pages = ceil( $allReplies / $perPage);

	return array( 'pages' => $pages , 'replies' => $replies , 'per-page' => $perPage);


}// getAllRepliesByTopicId


public function getNumberOfCommentsByTopicId($topic_id ){

$sql = 'select * from replies where topic_id = ? ';
$query = $this -> connect() -> prepare($sql );
$query -> execute( [ $topic_id ]);
$results = count($query -> fetchAll());
return $results;
}// getNumberOfCommentsByTopicId


public function getAllTopicsByForumId($forum_id ){


	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;
	$perPage = isset( $_GET['per-page']) && $_GET['per-page'] <= 5 ? (int)$_GET['per-page'] : 5 ;
	$start = ($page > 1 ) ? ($page * $perPage ) - $perPage : 0;

	$sql = 'select * from topics where forum_id = :forum_id  order by created_at desc LIMIT :start  , :perPage ';
	$query = $this -> connect() -> prepare($sql);
	$query -> bindParam( ':forum_id' , $forum_id , PDO::PARAM_INT );
	$query -> bindParam( ':start' , $start , PDO::PARAM_INT );
	$query -> bindParam( ':perPage' , $perPage , PDO::PARAM_INT );
	$query -> execute();
	$topics = $query -> fetchAll();

	$sql = 'select * from topics where forum_id = :forum_id';
	$query = $this -> connect() -> prepare($sql);
	$query -> bindParam( ':forum_id' , $forum_id , PDO::PARAM_INT );
	$query -> execute();
	$topicCount = $query -> fetchAll();
	$allTopics = count( $topicCount);
	$pages = ceil( $allTopics / $perPage);

	return array( 'pages' => $pages , 'topics' => $topics , 'per-page' => $perPage);


}// getAllTopicsByForumId

private function slugify($string){

return strtolower(trim(preg_replace( '/[^A-Za-z0-9-]+/','-',$string ) , '-'));
}// slugify 
private function checkIsAddTopicFormEmpty($title , $topic_sub_title ){

if( !empty($title) && !empty($topic_sub_title )){

	return true;
} else {
	return false;
}

}// checkIsAddTopicFormEmpty


public function addTopic($forum_id , $title , $topic_sub_title ){

if( $this -> checkIsAddTopicFormEmpty($title , $topic_sub_title )){


$user_id = $_SESSION['user_id'];
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$slug = $this -> slugify($title);
$sql = 'insert into topics ( title , topic_sub_title , user_id , created_at , updated_at , forum_id  , slug) values ( ? , ? , ? , ? , ? , ? , ? )';
$query = $this -> connect() ->  prepare($sql);
$query -> execute([  $title , $topic_sub_title , $user_id , $created_at , $updated_at , $forum_id  , $slug]);
echo '<div class="alert alert-success" role="alert">
  Topic is added .
</div>';

} else {
	echo '<div class="alert alert-danger" role="alert">
  Please , fill all fields in form.
</div>';
}



}// addTopic


public function getForumDetailsById($forum_id ){

	$sql = 'select * from forums where id = ? limit 1 ';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $forum_id ]);
	$result = $query -> fetch();
	return $result;

}// getForumDetailsById

public function getAllForums(){

	$sql = 'select * from forums order by title asc';
	$query = $this -> connect() -> query($sql);
	$forums = $query -> fetchAll();
	return $forums;


}// getAllForums

public function getLast3TopicsByForumId($forum_id ){

	$sql = 'select * from topics where forum_id = ? order by created_at desc limit 3';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $forum_id ]);
	$topics = $query -> fetchAll();
	return $topics ;


}// getAllTopicsByForumId

public function getCountOfTopicReplies($topic_id ){

	$sql = 'select * from replies where topic_id = ? ';
	$query = $this -> connect() -> prepare($sql);
	$query ->  execute([ $topic_id ]);
	$replies = count( $query -> fetchAll());
	return $replies;


}// getCountOfTopicReplies



}// Forum 
