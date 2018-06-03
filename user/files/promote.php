<?php 
    if(isset($_GET['promote_id'])){
        $promoteUID = $_GET['promote_id'];
        $update = "UPDATE table_user SET level =level +'1' WHERE id = '$promoteUID'"; 
        $Result = $db->update($update);
        if($Result){ 
            echo "<script> alert('Level Update successful !'); </script>"; 
            echo "<script> window.location='index.php?pageid=promote';  </script>"; 
        }
    }
?>
            <section class="row member_list">
                <div class="row-fixed">
                    <div class="panel panel-default">
                        <div class="panel-heading pull-left col-xs-12">
                            <h4 class="text-left pull-left">Promote Member</h4>
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
<?php 
    $level = $_SESSION['level']; 
    $snetid = $_SESSION['network_id'];
    $l_nid = strlen($snetid); 

    if($level == '2'){
        include 'php/levelTwo.php'; 

    }elseif($level == '3'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; 

    }elseif($level == '4'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; 

    }elseif($level == '5'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; 

    }elseif($level == '6'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; include 'php/levelSix.php'; 

    }elseif($level == '7'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; include 'php/levelSix.php'; include 'php/levelSeven.php'; 

    }elseif($level == '8'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; include 'php/levelSix.php'; include 'php/levelSeven.php'; include 'php/levelEight.php'; 

    }elseif($level == '9'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; include 'php/levelSix.php'; include 'php/levelSeven.php'; include 'php/levelEight.php'; include 'php/levelNine.php'; 

    }elseif($level == '10'){
        include 'php/levelTwo.php'; include 'php/levelThree.php'; include 'php/levelFour.php'; include 'php/levelFive.php'; include 'php/levelSix.php'; include 'php/levelSeven.php'; include 'php/levelEight.php'; include 'php/levelNine.php'; include 'levelTen.php'; 
    }elseif($level =='admin'){
        include 'php/levelAdmin.php'; 
    }
?> 
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>




<!--style or error message-->        
<style> #error{ color:red; } </style>

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
    </body>
</html>