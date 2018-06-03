<?php ob_start(); ?>
<?php 
    include '../lib/Session.php'; 
    Session::init();
?>
<?php 
    if(!isset($_SESSION['login'])){
        header('Location:../index.php');
    }   
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php 
    $db = new Database();
    $fm = new Format();
?>

<?php //logout function 
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
        header('Location:../index.php'); 
    }
?>  

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Summatop-<?php if($pageid){echo $pageid; } ?></title>
        <link rel="icon" href="../images/logo.png"><!--title bar logo-->
        <link href="../stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="../css/hierarchy-view.css" rel="stylesheet" type="text/css"/>
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.custom.css" rel="stylesheet" type="text/css"/>
         <link href="../css/simplePagination.css" rel="stylesheet" type="text/css"/>

        <script src="../js/jquery-3.2.0.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!--<script src="../js/jquery-3.2.0.js" type="text/javascript"></script>-->
        <!--<script src="../js/common.js" type="text/javascript"></script>-->
    </head>
    <body>
        <div class="wrapper">
            <header class="row header">
                <div class="row-fixed">
                    <div class="pull-left">
                        <h1 class="logo">SUMMATOP</h1>
                    </div>
                    <div class="pull-right">
                        <div class="acoount-btn-wrap">
                            <a class="acc_name" href="?pageid=my_account"><?php echo $_SESSION['username']; ?></a>
                            <a href="?action=logout">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row navigation">
                <div class="row-fixed">
                    <nav class="pull-left">
                        <ul>
                            <?php $class= "class='active'"; ?>
                            <li><a href="index.php?pageid=binary_tree" <?php if($pageid == 'binary_tree'){ echo $class; } ?>>Binary Tree</a></li>
                            <li><a href="index.php?pageid=member_list" <?php if($pageid == 'member_list'){ echo $class; } ?>>Member List</a></li>
                            <li><a href="index.php?pageid=promote" <?php if($pageid == 'promote'){ echo $class; } ?>>Promote Member</a></li>
                            <li><a href="index.php?pageid=get_promotion" <?php if($pageid == 'get_promotion'){ echo $class; } ?>>Get Promotion</a></li>
                            <li><a href="index.php?pageid=add_hands" <?php if($pageid == 'add_hands'){ echo $class; } ?>>Add Hand</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>