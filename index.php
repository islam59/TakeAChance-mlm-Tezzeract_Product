<?php ob_start(); ?>
<?php 
    include 'lib/Session.php'; 
    Session::init();
?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
<?php 
    $db = new Database();
    $fm = new Format();
?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $fm->validation($_POST['username']);
        $password = $fm->validation(md5($_POST['password']));

        $username =  mysqli_real_escape_string($db->link,$username);
        $password =  mysqli_real_escape_string($db->link,$password);

        $query = "SELECT * FROM table_user WHERE username='$username' OR loginid='$username' AND password = '$password' AND status=1";
        $result = $db->select($query);

        if($result != false){
            $value = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);
            if($row > 0){
                Session::set("login",true);
                Session::set("id", $value['id']);
                Session::set("password", $value['password']);
                Session::set("username", $value['username']);
                Session::set("loginid", $value['loginid']);
                Session::set("network_id", $value['networkid']);
                Session::set("level", $value['level']);
                             
                if(Session::get('username')){
                    header("Location:user/index.php");   
                }
            }else{
               $reports = "<span style='color:red; padding:2px; text-align:center; '> User Not Found ! </span>";
            }   
        }else{
           $reports = "<span style='color:red; padding:2px; text-align:center; '> Username or Password Not Matched ! </span>";
        } 
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
        <title>Summatop-Login</title>
        <link rel="icon" href="images/logo.png"><!--title bar logo-->
        <link href="stylesheet.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.0.js" type="text/javascript"></script>
        <!--<script src="js/common.js" type="text/javascript"></script>-->
    </head>
    <body>
        <div class="wrapper">
            <header class="row header">
                <div class="row-fixed">
                    <div class="pull-left">
                        <h1 class="logo">SUMMATOP</h1>
                    </div>
                    <div class="pull-right">
                        <form action="index.php" method="post">
                        <?php if(!empty($reports)){ echo '<br/>'.$reports.'<br/>'; } ?>
                            <div class="pull-left form-group login_margin"> 
                                <label><small>Username</small></label><br>
                                <input type="text" required="required" name="username">
                            </div>
                            <div class="pull-left form-group login_margin">
                                <label><small>Password</small></label><br>
                                <input type="password" required="required" name="password">
                            </div>
                            <div class="pull-left form-group">
                                <input class="login-btn" type="submit" value="Log In">
                            </div>
                        </form>
                       
                    </div>
                </div>
            </header>
            <div class="row home_banner">
                <div class="pull-left glass">
                    <img class="pull-left" src="images/interpretation-meeting - Copy.jpg" alt="">
                    <img class="pull-left" src="images/gestor-financeiro-blog-unipe-graduacao.jpg" alt="">
                </div>
                <!--<div class="glassefct"></div>-->
            </div>
            <div class="row flag_banner">
                <div class="row-fixed">
                    <div class="pull-left" style="overflow: hidden;">
                        <div class="pull-left flag_wrp">
                            <img class="pull-left" src="images/ani-flag/australia-flag-animation.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/Canada_Flag_waving.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/new-zealand-flag-animation.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/Denmark animation (7).gif" alt="">
                            <img class="pull-left" src="images/ani-flag/chinese-flag-waving-gif-animation-28.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/sri_lanka.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/indian-flag-waving-gif-animation-10.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/Bangladesh_240-animated-flag-gifs.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/cambodia-flag-animation.gif" alt="">
                            <img class="pull-left" src="images/ani-flag/Nepal.gif" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
