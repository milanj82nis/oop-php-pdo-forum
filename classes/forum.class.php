<?php 


class Forum extends DbConnect {


public function getAllForums(){

	$sql = 'select * from forums order by title asc';
	$query = $this -> connect() -> query($sql);
	$forums = $query -> fetchAll();
	return $forums;


}// getAllForums

public function getAllTopicsByForumId($forum_id ){

	$sql = 'select * from topics where forum_id = ? order by created_at desc';
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
