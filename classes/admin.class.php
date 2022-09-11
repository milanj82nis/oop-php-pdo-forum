<?php 

class Admin extends DbConnect {

private function slugify($string){

return strtolower(trim(preg_replace( '/[^A-Za-z0-9-]+/','-',$string ) , '-'));
}// slugify 
public function checkIsUserAdmin(){

if( isset($_SESSION['is_admin']) == 1 ){
	return true;
} else {
	return false;
}

}// checkIsUserAdmin

private function checkIsAddForumFormEmpty($title){

if( !empty($title)){

	return true;
} else {
	return false;
}


}// checkIsAddForumFormEmpty






public function addForum($title){

if ( $this -> checkIsAddForumFormEmpty($title)){


$user_id = (int)$_SESSION['user_id'];
$created_at = date ( 'Y-m-d H:i:s');
$updated_at = date ( 'Y-m-d H:i:s');
$slug = $this -> slugify($title);

$sql = 'insert into forums ( title , user_id , slug , created_at , updated_at ) values ( ? , ? , ? , ? , ? ) ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([  $title , $user_id , $slug , $created_at , $updated_at ]);
header('Location:index.php');


} else {
	echo '<div class="alert alert-danger" role="alert">
  Please , fill all fields in form.
</div>';}



}// addForum



}// Admin