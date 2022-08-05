 <?php 
 require_once('top.inc.php');

$order_id = get_safe_value($con, $_GET['id']);


$coupon_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT coupon_value, coupon_code FROM `order` WHERE id='$order_id'"));

$coupon_value = $coupon_details['coupon_value'];
$coupon_code = $coupon_details['coupon_code'];
if(isset($_POST['update_order_status'])){
  $update_order_status = $_POST['update_order_status'];
  mysqli_query($con, "update `order` SET order_status='$update_order_status' WHERE id='$order_id'");

}
 ?>
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Detail</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                               <table class="table">
                                        <thead>
                                            <tr>
                                                
        <th class="product-thumbnail">Product Name</th>
        <th class="product-name">Product Image</th>
        <th class="product-quantity">Quantity</th>
        <th class="product-price">Price</th>
        <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php 


 /*$res = mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name, product.image, `order`.address, `order`.city, `order`.pincode FROM order_detail, product , `order` WHERE order_detail.order_id='$order_id'  AND order_detail.product_id=product.id");*/
 $res = mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name, product.image FROM order_detail, product , `order` WHERE order_detail.order_id='$order_id' AND order_detail.product_id=product.id");                             
 $total_price = 0;
            while($row=mysqli_fetch_assoc($res)){
            //$address = $row['address'];
            //$city = $row['city'];
            //$pincode = $row['pincode'];
            $total_price = $total_price+($row['qty']*$row['price']);
            ?>
                <tr>
                    <td class="product-name"><?php echo $row['name'];?></td>
                <td class="product-image"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']; ?>" height="100px" width="100px"></td>
                <td class="product-quantity"><?php echo $row['qty'];?></td>
            <td class="product-price"><?php echo $row['price'];?></td>
<td class="product-price"><?php echo $row['qty']*$row['price'];?></td>
                                            </tr>
                                       

                                        <?php } 

                                        if($coupon_value!=''){
                                        ?>
        <tr>
            <td colspan="3"></td>
            <td class="product-price">Coupon Value</td>
            <td class="product-price"><?php echo $coupon_value."($coupon_code)";?></td>
        </tr>
                <?php } ?>
             <tr>
                <td colspan="3"></td>
            <td class="product-price">Total Price</td>
<td class="product-price"><?php  echo $total_price-$coupon_value;?></td>
                                            </tr>
                                        </tbody>
                     </table>
                     <div id="address_details">
                           <strong>
                             Address:
                           </strong>
                           <?php 
                           $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `order`   WHERE `order`.id='$order_id'")); ?>
                              <?php  echo $order_status_arr['address'];?>,
                              <?php echo $order_status_arr['city'];?>,
                              <?php echo $order_status_arr['pincode'];?><br><br>
                            <strong>
                             Order Status:
                           </strong>
                           <?php 
                     $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT order_status.name FROM order_status,`order` WHERE `order`.id='$order_id' AND `order`.order_status=order_status.id")); 
                     echo $order_status_arr['name']; 
                           ?>
                           <div>
                             <form method="post">
                        <select class="form-control" name="update_order_status">
                                  <option>Select Status</option>
                                  <?php 
                                  $res = mysqli_query($con, "SELECT * FROM  order_status");
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                      if($row['id']==$categories_id){
                                        echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                      }else{
                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                      }
                                      
                                    }
                                  ?>
                              </select><br>
                             <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-warning btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                             </form>
                            </div>
                        </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
         <?php require_once('footer.inc.php'); ?>