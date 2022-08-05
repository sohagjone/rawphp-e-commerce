<?php 
include('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');

if(!$_SESSION['ADMIN_LOGIN']){
   if(!isset($_SESSION['USER_ID'])){
      die();
   }
}
//https://www.youtube.com/watch?v=rD92yE1RQCo&list=PLWCLxMult9xfYlDRir2OGRZFK397f3Yeb&index=19
$order_id = get_safe_value($con, $_GET['id']);

   $html = '<h1 align="center" style="color:red;">Invoice</h1>

<div class="table-content table-responsive">
   <table align="center" border="1">
      <thead>
         <tr>
            <th class="product-thumbnail">prod Image</th>
            <th class="product-name">products Name</th>
            <th class="product-price">Price</th>
            <th class="product-quantity">Quantity</th>
            <th class="product-subtotal">Total Price</th>
         </tr>
      </thead>
      <tbody>';

  if(isset($_SESSION['ADMIN_LOGIN'])){
         $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
      }else{
         $uid=$_SESSION['USER_ID'];
         $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
      }

      $total_price=0;
      if(mysqli_num_rows($res)==0){
         die();
      }
      while($row=mysqli_fetch_assoc($res)){
      $total_price=$total_price+($row['qty']*$row['price']);
       $pp=$row['qty']*$row['price'];
           
         $html.='<tr>
            <td class="product-thumbnail"><img src="'.PRODUCT_IMAGE_SITE_PATH.$row['image'].'" height="50" width="50"></td>
            <td class="product-name" align="center">'.$row['name'].'</td>
            <td class="product-name" align="center">'.$row['price'].'</td>
            <td class="product-name" align="center">'.$row['qty'].'</td>
            <td class="product-name" align="center">'.$pp.'</td>
         </tr>';
      }
      $html.='<tr>
               <td colspan ="3"></td>
               <td class="product-name">Total Price</td>
               <td class="product-name" align="center">'.$total_price.'</td>';
      $html.='</tbody>
   </table>
</div>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time().'.pdf';
$mpdf->Output($file, 'D');

?>
  
  