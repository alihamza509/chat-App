<center><h1>CMNTS DETAIL</h1></center>

<div class="card-body">
                                <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
      <tr>
        <th>cmnt_ID</th>
    <th>user ID</th>  
    <th>post_iD</th>  
    <th>cmnt_TITLE</th>
    <th>cmnt_PERSON</th>
    <th>cmnt_DATE</th>
    <th>p_delete</th> 
                                                
                </tr>
      <?php
  $q="select*from cmnts";
  $qq=mysqli_query($con,$q);
  While($qqq=mysqli_fetch_array($qq)){
  $cid=$qqq['cmnt_id'];
  $title=$qqq['user_id'];
  $post=$qqq['post_id'];
  $titles=$qqq['cmnt_title'];
  $person=$qqq['cmnt_person'];
  $price=$qqq['cmnt_date'];
  ?>
  
    
    <tr>
      <th><?php echo $cid ?></th>
    <th><?php echo $title ?></th>
    <th><?php echo $post ?></th>  
    <th><?php echo $titles ?></th>
    <th><?php echo $person ?></th>
    <th><?php echo $price ?></th> 
    <th><a href="index.php?c_delete=<?php echo $cid ?>">DELETE</a></th> 
        
    </tr><?php } ?>
              </thead>
                                        
             </tbody>
             </table>
             </div>
         </div>