<?php 
    if(isset($_GET['network_id'])){
        $network_id = $_GET['network_id']; 
    }else{
        $network_id = $_SESSION['network_id']; 
    }
?>   
<?php //removing the last postion of string for goup button..
    $goUp = substr($network_id, '0','-1');
?> 
  <section class="row main">
                <div class="row-fixed">
                    <div class="pull-left text-center" style="width: 100%; margin-top: 30px; color:teal; ">

<?php //filter the Go Up button without the admin level.
   $gLenth = strlen($goUp);
   $uLenth = strlen($_SESSION['network_id']);

    if($gLenth < $uLenth){ 
        //packing of goUp button//
    }else{
?>
    <a href="index.php?network_id=<?php echo $goUp; ?>" class="btn btn-success">Go Up</a> 
<?php } ?>
                    </div>
                    <div class="pull-left tree-view management-hierarchy">
                        <div class="hv-container">
                            <div class="hv-wrapper">

                                <!-- Key component -->
                                <div class="hv-item">

                                    <div class="hv-item-parent">
                                        <div class="person">
                                    <?php 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$network_id'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br/>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>                                                
                                            </div>
                                    <?php } ?>       
                                        </div>
                                    </div>

                                    <div class="hv-item-children">

                                        <div class="hv-item-child">
                                            <!-- Key component -->
                                            <div class="hv-item">

                                                <div class="hv-item-parent">
                                                    <div class="person">
                                    <?php //person 2
                                        $p2 = $network_id.'1'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p2'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>        
                                                    </div>
                                                </div>

                                                <div class="hv-item-children">

                                                    <div class="hv-item-child">
                                                        <div class="person">
                                    <?php //person 4
                                        $p4 = $network_id.'11'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p4'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>

                                                        </div>
                                                    </div>


                                                    <div class="hv-item-child">
                                                        <div class="person">
                                    <?php //person 5
                                        $p5 = $network_id.'12'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p5'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                        <div class="hv-item-child">
                                            <!-- Key component -->
                                            <div class="hv-item">

                                                <div class="hv-item-parent">
                                                    <div class="person">
                                    <?php //person 3
                                        $p3 = $network_id.'2'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p3'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>
                                                    </div>
                                                </div>

                                                <div class="hv-item-children">

                                                    <div class="hv-item-child">
                                                        <div class="person">
                                    <?php //person 6
                                        $p6 = $network_id.'21'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p6'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>
                                                        </div>
                                                    </div>


                                                    <div class="hv-item-child">
                                                        <div class="person" >
                                    <?php //person 7
                                        $p7 = $network_id.'22'; 
                                        $userQuery = "SELECT * FROM table_user WHERE networkid='$p7'"; 
                                        $userResult = $db->select($userQuery); 
                                        if($userResult){
                                            $userValue = mysqli_fetch_array($userResult); 
                                    ?>
                                            <a href="?network_id=<?php echo $userValue['networkid']; ?>">
                                                <img src="../images/person1.jpg" alt="">
                                            </a>
                                            <div class="name">
                                                <span>ID: <?php echo$userValue['loginid']; ?></span>
                                                <br>
                                                <span><?php echo $userValue['username']; ?></span>
                                                <br>
                                                <span>Level <?php echo $userValue['level']; ?></span>
                                                <br>
                                                <?php if($userValue['networkid'] == $_SESSION['network_id'] || $_SESSION['level'] == 'admin'){ ?>
                                                    <a class="btn btn-primary btn-sm" href="index.php?pageid=edit&edit_id=<?php echo $userValue['id']; ?>">EDIT</a>
                                                <?php } ?>
                                            </div>
                                    <?php }else{ echo "<span style='color:white; font-size:30px; font-weight:bold; '>N/A"; } ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
