<?php $id = $_SESSION['id']; ?>
<?php 
    if(isset($_GET['update'])){
        $update = $_GET['update']; 
        
        if($update == 'username'){
            //phone number update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username =  mysqli_real_escape_string($db->link,$_POST['username']);
                if($username == ""){ $message = "<span class='error'>Data not be empty !</span>"; }
                else{
                    $update = "UPDATE table_user SET username = '$username' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ $message = "<span style='color:teal; '>Update Successfull.</span>"; }
                }
            }//end of phone number update..

        }elseif($update == 'phone'){
            //phone number update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $phone =  mysqli_real_escape_string($db->link,$_POST['phone']);
                if($phone == ""){ $message = "<span class='error'>Data not be empty !</span>"; }
                else{
                    $update = "UPDATE table_user SET phone = '$phone' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ $message = "<span style='color:teal; '>Update Successfull.</span>"; }
                }
            }//end of phone number update..

        }elseif($update == 'country'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $country =  mysqli_real_escape_string($db->link,$_POST['country']);
                if($country == ""){ $message = "<span class='error'>Data not be empty !</span>"; }
                else{
                    $update = "UPDATE table_user SET country = '$country' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ $message = "<span style='color:teal; '>Update Successfull.</span>"; }
                }
            }//end of country update..
            
        }elseif($update == 'dateofbirth'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $dateofbirth =  mysqli_real_escape_string($db->link,$_POST['dateofbirth']);
                if($dateofbirth == ""){ $message = "<span class='error'>Data not be empty !</span>"; }
                else{
                    $update = "UPDATE table_user SET dateofbirth = '$dateofbirth' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ $message = "<span style='color:teal; '>Update Successfull.</span>"; }
                }
            }//end of country update..
        }elseif($update == 'password'){
            //country update..
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $userpassword = $_SESSION['password']; echo "<br/>";

                $password       =  $fm->validation(md5($_POST['password']));
                $c_password     =  $fm->validation(md5($_POST['c_password']));
                $old_password   =  $fm->validation(md5($_POST['old_password']));

                $password       =  mysqli_real_escape_string($db->link,$password);
                $c_password     =  mysqli_real_escape_string($db->link,$c_password);
                $old_password   =  mysqli_real_escape_string($db->link,$old_password);

                if($password == "" OR $c_password == "" OR $old_password == ""){ 
                    $message = "<span style='color:red; '>Data not be empty !</span>"; 
                }elseif($password != $c_password){
                    $message = "<span style='color:red; '>Password Not Match !</span>"; 

                }elseif($old_password != $userpassword){                   
                    $message = "<span style='color:red; '>Previous Password Wrong !.</span>";
                }else{
                    $update = "UPDATE table_user SET password = '$password' WHERE id = '$id'"; 
                    $Result = $db->update($update);
                    if($Result){ 
                         $message = "<span style='color:teal; '>Update Successfull
                         <a href='?action=logout' class='btn btn-warning btn-sm'>Re-Login</a>
                         </span><br/>";

                    }
                }
            }//end of password update..
        }
    }else{ $message = ''; }
?>



 <?php //user data fetch for update & show...
    $query = "SELECT * FROM table_user WHERE id='$id'"; 
    $result = $db->select($query); 
    if($result){
        $value = mysqli_fetch_array($result);
?>
            <section class="row member_list">
                <div class="row-fixed">
                    <?php if ($message){echo $message; } ?>
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
                                                <td></td>
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
        <!-- Modal USER NAME-->
        <div id="confirm-promo-username" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="index.php?pageid=my_account&update=username" method="post">
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
                    <form action="index.php?pageid=my_account&update=phone" method="post">
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
                    <form action="index.php?pageid=my_account&update=country" method="post">
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
                    <form action="index.php?pageid=my_account&update=dateofbirth" method="post">
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
                    <form action="index.php?pageid=my_account&update=password" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Password !</h4>
                    </div>
                    <div class="modal-body">
                        <p> <label for="password">New Password: </label><input type="text" id="password" name="password" class="form-control"></p>                        
                        <p> <label for="c-password">Confirm New Password: </label><input type="text" id="c-password" name="c_password" class="form-control"></p>
                        <p><label for="old-password">Old Password: </label><input type="text" id="old-password" name="old_password" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Change Password" class="btn btn-success pull-left confirm-yes">
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>

    </body>
</html>