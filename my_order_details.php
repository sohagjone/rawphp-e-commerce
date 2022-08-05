<?php
require('top.php');

if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
$order_id = get_safe_value($con, $_GET['id']);

$coupon_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT coupon_value FROM `order` WHERE id='$order_id'"));

$coupon_value = $coupon_details['coupon_value'];


?>
 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
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
 $uid = $_SESSION['USER_ID'];

 $res = mysqli_query($con, "SELECT distinct(order_detail.id), order_detail.*,product.name, product.image FROM order_detail, product , `order` WHERE order_detail.order_id='$order_id' AND `order`.user_id= '$uid' AND order_detail.product_id=product.id");

 $total_price = 0;
            while($row=mysqli_fetch_assoc($res)){
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
            <td class="product-price"><?php echo $coupon_value;?></td>
        </tr>
                <?php } ?>
        <tr>
            <td colspan="3"></td>
            <td class="product-price">Total Price</td>
            <td class="product-price"><?php echo $total_price-$coupon_value; ?></td>
        </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require('footer.php');?>