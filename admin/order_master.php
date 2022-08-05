 <?php 
 require_once('top.inc.php');


 $sql = "SELECT * from users order by id desc";
 $res = mysqli_query($con, $sql);

 ?>
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Master</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                               <table class="table">
                                        <thead>
                                            <tr>
                                                
        <th class="product-thumbnail">Order ID</th>
        <th class="product-name"><span class="nobr">Order Date</span></th>
        <th class="product-price"><span class="nobr">Address</span></th>
        <th class="product-stock-stauts"><span class="nobr">Payment Type</span></th>
        <th class="product-stock-stauts"><span class="nobr">Payment Status</span></th>
        <th class="product-add-to-cart"><span class="nobr">Order Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php 
 $res = mysqli_query($con, "SELECT `order`.*, order_status.name AS order_status_str FROM `order`, order_status WHERE  order_status.id=`order`.order_status");

            while($row=mysqli_fetch_assoc($res))
                    {
                    ?>
      <tr>
         <td class="product-add-to-cart">
            <a href="order_master_detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['id'];?></a></br>
            <a href="../order_pdf.php?id=<?php echo $row['id'] ?>">PDF</a>
         </td>
         <td class="product-name">
            <a href="#"><?php echo $row['added_on'];?></a>
         </td>
         <td class="product-name">
            <a href="#"><?php echo $row['address'];?></a>
         </td>
         <td class="product-name">
            <a href="#"><?php echo $row['payment_type'];?></a>
         </td>
         <td class="product-price"><span class="amount">
            <?php echo $row['payment_status'];?></span>
         </td>
         <td class="product-stock-status"><span class="wishlist-in-stock">
            <?php echo $row['order_status_str'];?></span>
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