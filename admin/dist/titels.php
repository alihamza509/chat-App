<center><h1>TOTAL TITELS</h1></center>

<div class="card-body">
                                <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
      <tr>
        <th>TITLE_ID</th> 
    <th>TITLE_NAME</th> 
    <th>DELETE TITLE</th> 
                                                
                </tr>
      <?php
  $q="select*from title";
  $qq=mysqli_query($con,$q);
  While($qqq=mysqli_fetch_array($qq)){
  $tid=$qqq['title_id'];
  $title=$qqq['title_name'];
  
  ?>
    
    <tr>
       <th><?php echo $tid ?></th>
    <th><?php echo $title ?></th>   
    <th><a href="index.php?t_delete=<?php echo $tid ?>">DELETE</a></th>
        
    </tr><?php } ?>
              </thead>
                                        
             </tbody>
             </table>
             </div>
         </div>