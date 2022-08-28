<?php 

class User extends DbConnect {

public function checkIsUserLoggedIn(){

	if( isset($_SESSION['logged'])){
		return true;
	} else {
		return false;
	}


}// checkIsUserLoggedIn

private function checkIsRegisterFormEmpty( $first_name , $last_name , $email , $username , $password , $confirm_password   ){

if( !empty($first_name ) &&  !empty($last_name ) &&  !empty($email ) &&  !empty($username ) &&  !empty($password ) &&   !empty($confirm_password ) ){

	return true;
} else {
	return false;
}


}// checkIsRegisterFormEmpty


private function checkIsEmailValid($email){

if( filter_var($email , FILTER_VALIDATE_EMAIL)){
	return true;
}else {
	return false;
}


}// checkIsEmailValid


private function checkIsEmailTaken($email){

	$sql = 'select email from users where email = ? limit 1 ';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $email ]);
	$results = $query -> fetchAll();
	if( count($results) == 0 ){
		return true;
	}else {
		return false;
	}

}

private function checkIsPasswordsSame ( $password , $confirm_password){

if( $password == $confirm_password ){

	return true;
}else {
	return false;
}

}// checkIsPasswordsSame

private function checkIsPasswordSafe($password ){

$number = preg_match('@[0-9]@', $password );
$uppercase = preg_match('@[A-Z]@', $password );
$lowercase = preg_match('@[a-z]@', $password );
$specialChars = preg_match('@[^\w]@', $password );

if( strlen( $password ) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars ){

	return false;
} else {
	return true;
}


}// checkIsPasswordSafe

public function checkIsUsernameTaken($username ){

$sql = 'select username from users where username = ? limit 1 ';
$query = $this -> connect()-> prepare($sql);
$query -> execute ( [ $username ]);
$results = $query -> fetchALL();
if ( count ($results ) == 0 ){
	return true;
}else {
	return false;
}

}// checkIsUsernameTaken




public function userRegistration ( $first_name , $last_name , $email , $username , $password , $confirm_password  ){

if( $this -> checkIsRegisterFormEmpty($first_name , $last_name , $email , $username , $password , $confirm_password  )){
if( $this -> checkIsEmailValid($email)){
if( $this -> checkIsEmailTaken($email)){
if( $this -> checkIsPasswordsSame($password , $confirm_password )){

if ( $this -> checkIsPasswordSafe($password )){

if( $this -> checkIsUsernameTaken($username )){

$hashed_pawword = password_hash($password , PASSWORD_DEFAULT);
$created_at = date( 'Y-m-d H:i:s');
$last_active = date ( 'Y-m-d H:i:s');

$sql = 'insert into users ( first_name , last_name , email , password , username , activated , last_active , blocked , created_at ) values ( ? , ? , ? , ? , ? , ? , ? , ? , ? )';

$query = $this -> connect() -> prepare($sql);
$query -> execute([  $first_name , $last_name , $email , $hashed_pawword , $username , 0 , $last_active , 0 , $created_at]);
echo 'Success';

} else {
	echo 'This username is already taken.';
}//checkIsUsernameTaken

} else {
	echo 'Password must be at least 8 characters in length and must contain at least one number , one uppercase letter , one lowercase letter and one special character.';
}//checkIsPasswordSafe
}else {
	echo 'Password and password confirmation must be same.';
}// checkIsPasswordsSame
} else {
	echo 'Email address is already taken.';
}// checkIsEmailTaken
} else {
	echo 'Please , enter valid email address';
}// checkIsEmailValid
}else {

echo 'Please , fill all fields in form.';

}// checkIsregisterFormEmpty 

}// userRegistration







}// User




