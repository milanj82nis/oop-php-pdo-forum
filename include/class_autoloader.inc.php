<?php 

spl_autoload_register( 'classAutoloader');

function classAutoloader ( $className ){

	$path = 'classes/';

	$extension = '.class.php';

	$fullPath = $path . $className . $extension ;

	require_once $fullPath;


}// classAutoloader


