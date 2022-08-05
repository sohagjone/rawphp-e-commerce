 <?php 
 require_once('top.inc.php');

 if(isset($_GET['type']) && $_GET['type']!='') {
    $type = get_safe_value($con, $_GET['type']);
    if($type == 'status'){
      $operation = get_safe_value($con, $_GET['operation']);
      if($operation =='active'){
         $status = '1';
      } else{
          $status = '0';
      }
      $id = get_safe_value($con, $_GET['id']); 
      $update_status_sql = "UPDATE categories SET status='$status' WHERE id='$id'";
      mysqli_query($con, $update_status_sql); 

    }

    if($type == 'delete'){
      $id = get_safe_value($con, $_GET['id']); 
      $delete_sql = "DELETE FROM categories WHERE id='$id'";
      mysqli_query($con, $delete_sql); 

    }
 }
 $sql = "SELECT * from categories order by categories asc";
 $res = mysqli_query($con, $sql);

 ?>
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-link"><a href="manage_categories.php">Add Categories </a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php 
                                 $i = 1;
                                 while($row = mysqli_fetch_assoc($res)) {?>
                                    <tr>  
                                       <td class="serial"><?php echo $i++ ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['categories']; ?></td>
                                       <td>
                                          <?php 
                                          if($row['status']==1)
                                          {
echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;&nbsp;"; 
                                          }else{
echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;&nbsp;";
                                          } 
   echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;&nbsp;";      
   echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";                                     
  //echo "&nbsp;<a href='?type=delete&id=".$row['id']."'>Edit</a>";                                       ?>
                                          
                                       </td>
                                    </tr>
                                 <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
         <?php require_once('footer.inc.php'); ?>