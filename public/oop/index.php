<?php 
	include 'a1.php';
	include 'a2.php';
	use OOP2\A2 as A2; 
	$ob = new A2();
	$ob -> getName();

	/*$anonymousFunction = function(){
		 echo 'this is anonymous function';
	};
	//$anonymousFunction();*/

	/*function getFunctionName($functionName){
		return  $functionName();
	}
	getFunctionName(function(){
		echo 'this is anonymousFunction';
	});*/
 ?>