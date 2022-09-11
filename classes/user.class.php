<?php 

require 'include/phpmailer/src/Exception.php';
require 'include/phpmailer/src/PHPMailer.php';
require 'include/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class User extends DbConnect {




public function getUserDetailsById($user_id ){

	$sql = 'select * from users where id = ? limit 1 ';
	$query = $this -> connect() -> prepare($sql);
	$query -> execute([ $user_id ]);
	$user = $query -> fetch();
	return $user;

}// getUserDetailsById



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
$token = bin2hex(openssl_random_pseudo_bytes(16));
$sql = 'insert into users ( first_name , last_name , email , password , username , activated , last_active , blocked , created_at , token  ) values (? ,  ? , ? , ? , ? , ? , ? , ? , ? , ? )';

$query = $this -> connect() -> prepare($sql);
$query -> execute([  $first_name , $last_name , $email , $hashed_pawword , $username , 0 , $last_active , 0 , $created_at , $token ]);


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '81c6b1215d4db2';
$mail->Password = 'c59f3cdff81acf';
    //Recipients
$mail->setFrom( ADMIN_EMAIL , ADMIN_NAME );
$mail->addAddress( $email  , $first_name );     //Add a recipient
    




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'User account activation';
    $mail->Body    = '


Please , click on link to activate your account : 
<a href="http://localhost/forum/activate.php?token='. $token .'&email='. $email .'">Activate your account</a>


    ';
    $mail->AltBody = '


Please , click on link to activate your account : 
<a href="http://localhost/forum/activate.php?token='. $token .'&email='. $email .'">Activate your account</a>



    ';

    $mail->send();
    echo 'Message has been sent';





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

public function activateUserAccount( $token , $email ){

$sql = 'select email , token from users where token = ? and email = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $token  , $email ]);
$results = $query -> fetchAll();

if( count($results ) > 0 ){

$sql = 'update users set activated = ? where token = ? and email = ? ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ 1 , $token , $email ]);
echo 'Your account is now activated.Please login so you add more posts and comments on forum. ';


} else {
	echo 'Wrong email or token.Please , try again later.';
}


}// activateUserAccount

private function checkIsLoginFormEmpty($email , $password ){

if( !empty($email ) && !empty($password )){

	return true;
} else {
	return false;
}


}// checkIsLoginFormEmpty


public function userLogin($email , $password ){

if( $this -> checkIsEmailValid($email)){
if( $this -> checkIsLoginFormEmpty($email , $password )){

$activated = 1 ;
$blocked = 0;

$sql = 'select * from users where email = :email and activated = :activated and blocked= :blocked limit 1 ';
$query = $this -> connect() -> prepare($sql);
$query -> bindParam ( ':email' , $email );
$query -> bindParam ( ':activated' , $activated );
$query -> bindParam ( 'blocked' , $blocked );
$query -> execute();

$results = $query -> fetchAll();

if( count($results ) > 0 ){

foreach ( $results as $result ){

$hashed_password = $result['password'];
if( password_verify ( $password , $hashed_password )){

$_SESSION['logged'] = 1 ;
$_SESSION['user_id'] = $result['id'];
$_SESSION['first_name'] = $result['first_name'];
$_SESSION['last_name'] = $result['last_name'];
$_SESSION['username'] = $result['username'];
$_SESSION['created_at'] = $result['created_at'];
$_SESSION['blocked'] = $result['blocked'];
$_SESSION['is_admin'] = $result['is_admin'];
$last_active = date( 'Y-m-d H:i:s');

$sql = 'update users set last_active = ? where email = ? limit 1 ';
$query = $this -> connect() -> prepare($sql);
$query -> execute([ $last_active , $email ]);
echo 'You are logged in .';
header('Location:my-account.php');

} else {

	echo 'Wrong email or password.';
}




}// foreach

} else {

	echo 'Wrong email or password.';
}


} else {
	echo 'Please , fill all filds in form.';
}// checkIsLoginFormEmpty
} else {
echo 'Enter valid email address.';
}// checkIsEmailValid
}// userLogin





}// User




