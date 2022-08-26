<?php 

class User extends DbConnect {

public function checkIsUserLoggedIn(){

	if( isset($_SESSION['logged'])){
		return true;
	} else {
		return false;
	}


}// checkIsUserLoggedIn



}// User




