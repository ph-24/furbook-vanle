<?php 
namespace OOP2;
	class A2 extends \OOP1\A1{
		public function getName(){
			parent::getName();
			echo 'class a2';
		}
	}
 ?>