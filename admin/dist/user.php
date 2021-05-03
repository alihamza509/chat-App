<center><h1>DETAILS OF POSTS</h1></center>

<div class="card-body">
                                <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
      <tr>
        <th>POST_ID</th>
        <th>user ID</th>    
        <th>TITLE</th>  
        <th>p_DATE</th>
        <th>p_delete</th>
                                                
                </tr>
                <?php
    $q="select*from posts";
    $qq=mysqli_query($con,$q);
    While($qqq=mysqli_fetch_array($qq)){
    $pid=$qqq['post_id'];
    $title=$qqq['user_id'];
    $titles=$qqq['post_title'];
    $price=$qqq['post_date'];
    ?>
    <tr>
        <th><?php echo $pid ?></th>
        <th><?php echo $title ?></th>   
        <th><?php echo $titles ?></th>
        <th><?php echo $price ?></th>   
        <th><a href="index.php?p_delete=<?php echo $pid ?>">DELETE</a></th> 
        
    </tr><?php } ?>
              </thead>
                                        
             </tbody>
             </table>
             </div>
         </div>