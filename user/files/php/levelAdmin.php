<?php 
    
    $query = "SELECT * FROM table_user WHERE networkid != 1 AND status='1' ORDER BY level DESC";

        $mySql_query = $db->select($query);
            if($mySql_query){
?>
            <table  id="MyTable" class="table table-condensed table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone no.</th>
                        <th>Level</th>
                        <th>Country</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
        <?php 
            while($result = $mySql_query->fetch_assoc()){
                    //$lunetid = strlen($result['networkid']);
        ?>
                    <tr class="">
                        <td class="clickable-link rename" data-href="warehouse_product_list.php"><span class="display"><?php echo $result['loginid']; ?></span><input type="text" class="edit-cat" required="" style="display:none"/></td>
                        <td><span><?php echo $result['username'];?></span></td>
                        <td><span><?php echo $result['phone'];?></span></td>
                        <td><span><?php echo $result['level'];?></span></td>
                        <td><span><?php echo $result['country'];?></span></td>
                        <td><span><?php echo $result['dateofbirth'];?></span></td>
                        <td>
                            <span>
                                <button href="" class="btn btn-default btn-sm btn-primary" type="button" data-toggle="modal" data-target="#confirm-promo-level<?php echo $result['id']; ?>" >Promote User</button>                                       
                            </span>                        
                        </td>
                    </tr> 
                            <!--Modal for update leve confirmation-->
                            <div id="confirm-promo-level<?php echo $result['id']; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog  modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">                     
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Confirm To Promote ?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo $result['username']; ?> To Level <?php echo $result['level']; ?> To Level <?php echo $result['level']+1; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="index.php?pageid=promote&promote_id=<?php echo $result['id']; ?>" class="btn btn sm btn-primary">Confirm</a>
                                            <a href='index.php?pageid=promote' class="btn btn-default pull-right" class="close" data-dismiss="modal">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
       }//end while of level 2 showing...///  
    } 
?>
                </tbody>
            </table>