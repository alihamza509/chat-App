<center><h1>DETAILS OF REGISTER USERS</h1></center>

<div class="card-body">
                                <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
      <tr>
        <th>MEMBER_ID</th>
    <th>MEMBER NAME</th>  
    <th>MEMBER EMAIL</th> 
    <th>MEMBER COUNTRY</th>
    <th>MEMBER GENDER</th>
    <th>MEMBER img</th>
    <th>MEMBER since</th>
    <th>Delete</th> 
                                                
                </tr>
      <?php
  $q="select*from register";
  $qq=mysqli_query($con,$q);
  While($qqq=mysqli_fetch_array($qq)){
  $mid=$qqq['user_id'];
  $title=$qqq['user_name'];
  $titles=$qqq['user_email'];
  $price=$qqq['user_country'];
  $jins=$qqq['user_gender'];
  $foto=$qqq['user_img'];
  $login=$qqq['user_login'];
  ?>
    
    <tr>
       <th><?php echo $mid ?></th>
    <th><?php echo $title ?></th> 
    <th><?php echo $titles ?></th>
    <th><?php echo $price ?></th>
    <th><?php echo $jins ?></th>
    <th><img src="images/<?php echo $foto ?>"width="50" height="50"></th>
    <th><?php echo $login ?></th>       
    <th><a href="index.php?m_delete=<?php echo $mid ?>">DELETE</a></th> 
        
    </tr><?php } ?>
              </thead>
                                        
             </tbody>
             </table>
             </div>
         </div>