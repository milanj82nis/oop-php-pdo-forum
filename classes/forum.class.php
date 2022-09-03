<?php 


class Forum extends DbConnect {



public function getAllRepliesByTopicId($topic_id ){


$sql = 'select * from replies where topic_id = ? order by created_at desc';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $topic_id ]);
$replies = $query -> fetchAll();
return $replies;

}// getAllRepliesByTopicId


public function getNumberOfCommentsByTopicId($topic_id ){

$sql = 'select * from replies where topic_id = ? ';
$query = $this -> connect() -> prepare($sql );
$query -> execute( [ $topic_id ]);
$results = count($query -> fetchAll());
return $results;
}// getNumberOfCommentsByTopicId


public function getAllTopicsByForumId($forum_id ){
	$sql = 'select * from topics where forum_id = ? order by created_at desc ';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $forum_id ]);
	$topics = $query -> fetchAll();
	return $topics ;

}// getAllTopicsByForumId

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
