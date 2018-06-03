<?php
    $userNetID = $_SESSION['network_id'];      
    $userLevel = $_SESSION['level']; 
?>
            <section class="row member_list">
                <div class="row-fixed">
                    <div class="panel panel-default">
                        <div class="panel-heading pull-left col-xs-12">
                            <h4 class="text-left pull-left">Get Promotion To Level #<?php echo $_SESSION['level']+1; ?></h4>
                        </div>
<?php 
    if($_SESSION['level'] != 'admin' ){
        if($userLevel == '1'){
            $promoterNetID = substr($userNetID, '0','-2');
        }elseif($userLevel == '2'){
            $promoterNetID = substr($userNetID, '0','-3');
        }elseif($userLevel == '3'){
            $promoterNetID = substr($userNetID, '0','-4');
        }elseif($userLevel == '4'){
            $promoterNetID = substr($userNetID, '0','-5');
        }elseif($userLevel == '5'){
            $promoterNetID = substr($userNetID, '0','-6');
        }elseif($userLevel == '6'){
            $promoterNetID = substr($userNetID, '0','-7');
        }elseif($userLevel == '7'){
            $promoterNetID = substr($userNetID, '0','-8');
        }elseif($userLevel == '8'){
            $promoterNetID = substr($userNetID, '0','-9');
        }elseif($userLevel == '9'){
            $promoterNetID = substr($userNetID, '0','-10');
        }

        $promoterFind = "SELECT * FROM table_user WHERE networkid = '1' OR networkid = '$promoterNetID' AND level > '$userLevel'";
        $promoter = $db->select($promoterFind);
        if($promoter){
            while($result = $promoter->fetch_assoc()){
?>
                        <div class="panel-body">
                            <div class="pull-left get-promo" style="width: 100%;">
                                <div class="pull-left">
                                    <img src="../images/person1.jpg" alt="avatar">
                                </div>
                                <div class="pull-left get-promo-acc">
                                    <h3>Name : <?php echo $result['username']; ?></h3>
                                    <h4>Level: <?php echo $result['level']; ?></h4>
                                    <h5>Phone: <?php echo $result['phone']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"></div>
<?php  
            }//end of while..
        }                         
    }else{
        echo "<h1 style='color:#024; margin-top:20px;'><br/><br/><Br/>Not Need to Promote Yourself.<br/><br/></h1>";
    }
?>
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
    </body>
</html>