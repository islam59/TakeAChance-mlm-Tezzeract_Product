
            <section class="row member_list">
                <div class="row-fixed">
                    <div class="panel panel-default">
                        <div class="panel-heading pull-left col-xs-12">
                            <h4 class="text-left pull-left">Member List</h4>
                        </div>
                        <div class="panel-body">

                            <div class="pull-left" style="width: 100%;">
                                <form action="index.php?pageid=member_list" method="" class="pull-right text-nowrap form-group">
                                    <span class="pull-left">Filter: </span>
                                    <div class="input-group">
                                        <input type="text" id="search" class="form-control pull-left" placeholder="Search Keywords..">
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive pull-left" style="width: 100%;">
<?php /*#code for member list code */
    $userNetId = $_SESSION['network_id'];//helper unid set..
    $uid = $_SESSION['id'];   //helper uid set..

    $query = "SELECT * FROM table_user WHERE networkid LIKE '$userNetId%' AND networkid!=1 AND status=1 ORDER BY id ASC";
    $member = $db->select($query);
    if($member){
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
                                    while($result = $member->fetch_assoc()) {  
                                        $showid = $result['id'];
                                        if($_SESSION['id'] != $showid){
                            ?>
                                        <tr class="">
                                            <td class="clickable-link rename" data-href="warehouse_product_list.php">
                                                <span class="display"><?php echo $result['loginid']; ?></span>
                                                <input type="text" class="edit-cat" required="" style="display:none"/>
                                            </td>
                                            <td>
                                                <span><?php echo $result['username']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $result['phone']; ?></span>
                                            </td>
                                            <td>
                                                <span>Level <?php echo $result['level']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $result['country']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $result['dateofbirth']; ?></span>
                                            </td>
                                            <td>
                                                <span>
                                                <?php 
                                                    if($showid == $uid || $_SESSION['level'] == 'admin'){
                                                ?>
                                        <a href="index.php?pageid=edit&edit_id=<?php echo $result['id']; ?>" class="btn btn sm btn-primary">Edit</a>
                                                <?php }else{ ?>

                                        <a href='#' class='btn btn sm btn-default'>no edit</a>
                                                <?php } ?>
                                                    
                                                </span>
                                            </td>
                                        </tr>
                            <?php } }//end while... ?>

                                    </tbody>
                                </table>  
<?php }else{ echo "<h1>No User Found !</h1>"; } ?>                       
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
<!--#jquery 3.2.1 support [for live search..]-->
<script src="js/jquery-3.2.1.min.js"></script>

<script> /*function documention for jquery live search..*/
    $(document).ready(function(){
        $('#search').keyup(function(){
            search_table($(this).val());
        });
        function search_table(value){
            $('#MyTable tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >=0 ){
                        found = 'true';
                    }
                });
                if(found == 'true'){
                    $(this).show(); 
                }else{
                    $(this).hide();
                }
            });
        }
    });
</script>
</html>