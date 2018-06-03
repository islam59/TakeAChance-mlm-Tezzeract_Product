<?php 
	if(!isset($_GET['pageid'])){
		$pageid = 'binary_tree';
	}else{
		$pageid = $_GET['pageid']; 
	}
?>
<?php include 'inc/header.php'; ?>
<?php 

	if($pageid){
		include 'files/'.$pageid.'.php'; 
	}else{
		include 'files/binary_tree.php'; 
	}
?>