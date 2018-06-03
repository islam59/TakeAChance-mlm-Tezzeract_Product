<?php 
	if(isset($_GET['edit_id'])){
		$id = $_GET['edit_id'];
	}
?>
<?php 
    if(isset($_GET['update'])){
        $update = $_GET['update']; 
        if($update == 'username'){
            //phone number update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username =  mysqli_real_escape_string($db->link,$_POST['username']);
                if($username == ""){ 
                    echo "<script>alert('Field Must Not Empty !');</script>"; 
                    echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>";
                 }
                else{
                    $update = "UPDATE table_user SET username = '$username' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){  
                        echo "<script>alert('Update Successful !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }
            }//end of phone number update..

        }elseif($update == 'phone'){
            //phone number update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $phone =  mysqli_real_escape_string($db->link,$_POST['phone']);
                if($phone == ""){ 
                        echo "<script>alert('Field Must Not Empty !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>";
                }else{
                    $update = "UPDATE table_user SET phone = '$phone' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){  
                    	echo "<script>alert('Update Successful !');</script>"; 
                    	echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }
            }//end of phone number update..

        }elseif($update == 'country'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $country =  mysqli_real_escape_string($db->link,$_POST['country']);
                if($country == ""){ 
                    echo "<script>alert('Field Must Not Empty !');</script>"; 
                    echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>";
                }else{
                    $update = "UPDATE table_user SET country = '$country' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){  
                    	echo "<script>alert('Update Successful !');</script>"; 
                    	echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }
            }//end of country update..
            
        }elseif($update == 'dateofbirth'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $dateofbirth =  mysqli_real_escape_string($db->link,$_POST['dateofbirth']);
                if($dateofbirth == ""){ 
                        echo "<script>alert('Field Must Not Empty !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>";
                }else{
                    $update = "UPDATE table_user SET dateofbirth = '$dateofbirth' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){  
                    	echo "<script>alert('Update Successful !');</script>"; 
                    	echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }
            }//end of country update..
        }elseif($update == 'level'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $level =  mysqli_real_escape_string($db->link,$_POST['level']);
                if($level == ""){ 
                        echo "<script>alert('Field Must Not Empty !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>";
                }else{
                    $update = "UPDATE table_user SET level = '$level' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){  
                        echo "<script>alert('Update Successful !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }
            }//end of country update..
        }elseif($update == 'password'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                if($_SESSION['level'] == 'admin'){
                    $userpassword = $_SESSION['password']; 
                    $password =  $fm->validation(md5($_POST['password']));
                    $c_password =  $fm->validation(md5($_POST['c_password']));

                    $password =  mysqli_real_escape_string($db->link,$password);
                    $c_password =  mysqli_real_escape_string($db->link,$c_password);
                }else{
                    $userpassword = $_SESSION['password']; 
                    $password =  $fm->validation(md5($_POST['password']));
                    $c_password =  $fm->validation(md5($_POST['c_password']));
                    $old_password =  $fm->validation(md5($_POST['old_password']));

                    $password =  mysqli_real_escape_string($db->link,$password);
                    $c_password =  mysqli_real_escape_string($db->link,$c_password);
                    $old_password =  mysqli_real_escape_string($db->link,$old_password);
                }




                if($password == "" OR $c_password == ""){ 
                        echo "<script>alert('Field Must Not Empty !');</script>"; 
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                }
                if($password != $c_password){
                     echo "<script>alert('Password Not Matched !');</script>";
                     echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                }
                if($_SESSION['level'] != 'admin'){
                    if($userpassword != $password){
                            echo "<script>alert('Error Old Password !');</script>";
                            echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }else{
                        $update = "UPDATE table_user SET password = '$password' WHERE id = '$id' AND password='$old_password'"; 
                        $Result = $db->update($update);
                        if($Result){ 
                            echo "<script>alert('Update Successful !');</script>";
                            echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                        }
                    }
                }else{
                    $update = "UPDATE table_user SET password = '$password' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ 
                        echo "<script>alert('Update Successful !');</script>";
                        echo "<script>window.location('index.php?pageid=edit&edit_id=".$id."');</script>"; 
                    }
                }

            }//end of country update..
        }
    }
?>



 <?php //user data fetch for update & show...
    $query = "SELECT * FROM table_user WHERE id='$id'"; 
    $result = $db->select($query); 
    if($result){
        $value = mysqli_fetch_array($result);
?>
            <section class="row member_list">
                <div class="row-fixed">
                    <div class="panel panel-default">
                        <div class="panel-heading pull-left col-xs-12">
                            <h4 class="text-left pull-left">My Account</h4>
                        </div>
                        <div class="panel-body">
                            <div class="pull-left userinfo" style="width: 100%;">

                                <div class="pull-left" style="width: 100%;">
                                    <table class="userinfo">
                                        <tbody>
                                            <tr>
                                                <td><span>User ID: </span></td>
                                                <td><span class="form-control"><?php echo $value['loginid']; ?></span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span>Username: </span></td>
                                                <td><span class="form-control"><?php echo $value['username']; ?></span></td>
                                                <td>
                                                    <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-username" >EDIT</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Password: </span></td>
                                                <!--<td><input class="form-control pull-left" type="password" value="password" readonly="readonly"></td>-->
                                                <td>
                                                    <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-password" >CHANGE PASSWORD</button>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><span>Phone Number: </span></td>
                                                <td><span class="form-control"><?php echo $value['phone']; ?></span></td>
                                                <td>
                                                    <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-phone" >EDIT</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Country: </span></td>
                                                <td><span class="form-control"><?php echo $value['country']; ?></span></td>
                                                <td>
                                                        <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-country" >EDIT</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Date of Birth: </span></td>
                                                <td><span class="form-control"><?php echo $value['dateofbirth']; ?></span></td>
                                                <td>
                                                    <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-dateofbirth" >EDIT</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Level: </span></td>
                                                <td><span class="form-control"><?php echo $value['level']; ?></span></td>
                                                <td>
                                                <?php if($_SESSION['level'] == 'admin'){ ?>
                                                    <button href="" class="btn btn-default btn-sm btn-success" type="button" data-toggle="modal" data-target="#confirm-promo-level" >EDIT</button>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Modal username-->
        <div id="confirm-promo-username" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=username" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Username !</h4>
                    </div>
                    <div class="modal-body">
                        <p><input type="text" value="<?php echo $value['username']; ?>" name="username" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal phone-->
        <div id="confirm-promo-phone" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=phone" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Phone Number !</h4>
                    </div>
                    <div class="modal-body">
                        <p><input type="text" value="<?php echo $value['phone']; ?>" name="phone" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal country-->
        <div id="confirm-promo-country" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=country" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Country Name!</h4>
                    </div>
                    <div class="modal-body">
                        <p><input type="text" value="<?php echo $value['country']; ?>" name="country" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal dateofbirth-->
        <div id="confirm-promo-dateofbirth" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=dateofbirth" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Date Of Birth !</h4>
                    </div>
                    <div class="modal-body">
                        <p><input type="text" value="<?php echo $value['dateofbirth']; ?>" name="dateofbirth" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Modal password-->
        <div id="confirm-promo-password" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=password" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Password !</h4>
                    </div>
                    <div class="modal-body">
                        <p> <label for="password">New Password: </label><input type="text" id="password" name="password" class="form-control"></p>                        
                        <p> <label for="c-password">Confirm New Password: </label><input type="text" id="c-password" name="c_password" class="form-control"></p>

                        <?php if($_SESSION['level'] != 'admin'){ ?><p><label for="old-password">Old Password: </label><input type="text" id="old-password" name="old_password" class="form-control"></p><?php } ?>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Change Password" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal level-->
        <div id="confirm-promo-level" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=edit&edit_id=<?php echo $id; ?>&update=level" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">User Level !</h4>
                    </div>
                    <div class="modal-body">
                        <p><input type="text" value="<?php echo $value['level']; ?>" name="level" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>

    </body>
</html>