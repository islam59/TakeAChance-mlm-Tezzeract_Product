            <section class="row member_list">
                <div class="row-fixed">
                    <div class="panel panel-default">
                        <div class="panel-heading pull-left col-xs-12">
                            <h4 class="text-left pull-left">Add Hand</h4>
                        </div>
                        <div class="panel-body">
                            <div class="pull-left userinfo" style="width: 100%;">

<?php //User insertion #code .........
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $loginId = $fm->validation($_POST['loginId']);//login id from form..
        $username    = $fm->validation($_POST['username']);             
        $password    = $fm->validation(md5($_POST['password']));   
        $c_password    = $fm->validation(md5($_POST['c_password'])); 
        $phone    = $fm->validation($_POST['phone']);
        $country = $fm->validation($_POST['country']);
        $dateofbirth = $fm->validation($_POST['dateofbirth']);
        $networkid = $fm->validation($_POST['networkid']);

        $loginId =  mysqli_real_escape_string($db->link,$loginId);
        $username =  mysqli_real_escape_string($db->link,$username);
        $password =  mysqli_real_escape_string($db->link,$password);
        $c_password =  mysqli_real_escape_string($db->link,$c_password);
        $phone =  mysqli_real_escape_string($db->link,$phone);
        $country =  mysqli_real_escape_string($db->link,$country);
        $dateofbirth =  mysqli_real_escape_string($db->link,$dateofbirth);
        $networkid =  mysqli_real_escape_string($db->link,$networkid);

        $phone_length = strlen($phone);

        if(empty($loginId)||empty($username)|| empty($password) || empty($phone)||empty($country)||empty($dateofbirth)||empty($networkid)){
            echo "<span style='color:red; '>Field must not be empty !</span>";
        }elseif($phone_length != '11'){
            echo "<span style='color:red; '>Phone Number Must will 11 Digits !</span>";
        }elseif($password == $c_password){
            $checkquery = "SELECT * FROM table_user WHERE username ='$username' OR networkid = '$networkid' limit 1";
            $check = $db->select($checkquery);
            if($check !=false){
                echo "<script>alert('User Already Exists !');</script>"; 
                echo "script>window.location='index.php?pageid=add_hands';</script>";
            }else{
                $query = "INSERT INTO table_user(loginid,username,password,phone,country,dateofbirth,networkid,level,status) VALUES('$loginId','$username','$password','$phone','$country','$dateofbirth','$networkid','1','1')";
                $catinsert = $db->insert($query);
                if($catinsert){
                    echo "<span style='color:teal;'>User Created Successfully. ! </span>";   
                    echo "<p style='font-size:18px; padding:10px; margin:10px'>User ID:".$loginId."<br/>Password:".$_POST['password']."</p>";           
                }else{
                    echo "<span style='color:red;'>User Not Created. !</span>";         
                }
            }
        }else{
            echo "<span style='color:red; '>Password Not Matched !</span>";

        }
    }
?><!--User insertion end...-->

<?php //set NID for new user.. and also check it with db...
     $addNID = ''; 
     $loginid = ''; 

     $userNetId = $_SESSION['network_id']; 
     $addUserOne = $userNetId.'1';
     $addUserTwo = $userNetId.'2';

    //check for 2nd user//
    $checkNetid = "SELECT * FROM table_user WHERE networkid='$addUserTwo'"; 
    $resultCheck = $db->select($checkNetid);
    if($resultCheck == false){
       $addNID = $addUserTwo;
    }
    //check for 1st user//
    $checkNetid = "SELECT * FROM table_user WHERE networkid='$addUserOne'"; 
    $resultCheck = $db->select($checkNetid);
    if($resultCheck == false){
       $addNID = $addUserOne;
    }     
?>
<?php 
    if($addNID){
    $loginid = rand(10000,99999);
   // $password = substr(uniqid(),rand(1,9),8);
?>
                                <form action="index.php?pageid=add_hands" method="post" class="pull-left" style="width: 100%;">
                                    <table class="userinfo">
                                        <tbody>
                                            <input type="hidden" value="<?php echo $addNID; ?>" name="networkid">
                                            <tr>
                                                <td><span>User ID: </span></td>
                                                <td><input name="loginId" class="form-control" type="text" value="<?php echo  $loginid; ?>" readonly="readonly"></td>
                                            </tr>
                                            <tr>
                                                <td><span>Username: </span></td>
                                                <td><input name="username" class="form-control" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><span>Password: </span></td>
                                                <td>
                                                    <input name="password" class="form-control" type="text"  >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Confirm Password: </span></td>
                                                <td>
                                                    <input name="c_password" class="form-control" type="text"  >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Phone Number: </span></td>
                                                <td><input name="phone" class="form-control" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><span>Country: </span></td>
                                                <td><input name="country" class="form-control" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><span>Date of Birth: </span></td>
                                                <td>
                                                    <input name="dateofbirth" class="form-control pull-left" type="date">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="form-control pull-left btn-success" type="submit" value="Submit">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
<?php 
    }else{
?>
        <h1>YOU ALREADY INCLUDED TWO USER !</h1>
<?php 
    }
?>
                            </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Modal -->
        <div id="confirm-promo" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Promote User</h4>
                    </div>
                    <div class="modal-body">
                        <p>Promote <span><b>User Name</b></span> to <sapn><b>level 2</b></sapn> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success pull-left confirm-yes">Yes</button>
                        <button class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            
            </div>
        </div>
          <script>
              $( function() {
                $( "#datepicker" ).datepicker({
                  showOn: "button",
                  buttonImage: "../images/calendar.png",
                  buttonImageOnly: true,
                  buttonText: "Select date"
                });
              } );
          </script>
    </body>
</html>
